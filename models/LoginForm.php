<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\user\UserRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    //private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }

    public function validatePassword($attributeName)
    {
        if ($this->hasErrors()){
            return;
        }
        $user = $this->getUser($this->username);
        if(!($user and $this->isCorrectHash($this->$attributeName, $user->password))){
            $this->addError('password', 'Неправильный логин или пароль');
        }
    }

    

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
//        return false;
//    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
 /*
 public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
  */  
 
    public $user;
    
    public function getUser($username)
    {
        if (!$this->user) {
            $this->user = $this->fetchUser($username);
        }

        return $this->user;
    }

    public function fetchUser($username)
    {
        return UserRecord::findOne(compact('username'));
    }

    public function isCorrectHash($plaintext, $hash)
    {
        return Yii::$app->security->validatePassword($plaintext, $hash);
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser($this->username);
            if(!$user){
                return false;
            }
            return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
}
