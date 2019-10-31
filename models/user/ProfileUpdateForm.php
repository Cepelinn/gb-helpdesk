<?php

namespace app\models\user;
 
use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;
 
class ProfileUpdateForm extends Model
{
    public $email;
    public $username;
    public $name;
 
    /**
     * @var User
     */
    private $_user;
 
    public function __construct(UserRecord $user, $config = [])
    {
        $this->_user = $user;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->name = $user->name;
        parent::__construct($config);
    }
 
    public function rules()
    {
        return [
            [['email','username', 'name'], 'required'],
            ['email', 'email'],
        ];
    }
 
    public function update()
    {
        
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            $user->username = $this->username;
            $user->name = $this->name;
            return $user->save();
        } else {
            return false;
        }
        
    }
}