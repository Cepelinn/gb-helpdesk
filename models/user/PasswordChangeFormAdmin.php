<?php

namespace app\models\user;
 
use yii\base\Model;
use Yii;
 
/**
 * Password reset form
 */
class PasswordChangeFormAdmin extends Model
{
    public $newPassword;
    public $newPasswordRepeat;
 
    /**
     * @var User
     */
    private $_user;
 
    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(UserRecord $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }
 
    public function rules()
    {
        return [
            [['newPassword', 'newPasswordRepeat'], 'required'],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
 
    public function attributeLabels()
    {
        return [
            'newPassword' => Yii::t('app', 'USER_NEW_PASSWORD'),
            'newPasswordRepeat' => Yii::t('app', 'USER_REPEAT_PASSWORD'),
        ];
    }
 
    
 
    /**
     * @return boolean
     */
    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->password = $this->newPassword;
            return $user->save();
        } else {
            return false;
        }
    }
}