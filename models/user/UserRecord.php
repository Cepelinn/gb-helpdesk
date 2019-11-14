<?php

namespace app\models\user;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

use app\models\tables\AuthAssignment;

/**
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $name
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 *
 * 
 */
class UserRecord extends ActiveRecord implements IdentityInterface
{





    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username',], 'string', 'max' => 45],
            [['password', 'authKey'], 'string', 'max' => 255],
            [['authKey', 'accessToken', 'name', 'email'], 'string', 'max' => 50],
            [['username', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'name' => 'Name',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'roleName' => 'Role Name',
        ];
    }



    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);
        if ($this->isAttributeChanged('password')){
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
        }

        if ($this->isNewRecord){
            $this->authKey = Yii::$app->security->generateRandomString(20);
        }

        return $return;
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }




    //IdentityInterface
    public function getId()
    {
        return $this->id;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    

    public function getRole()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }

    public function getRoleName()
    {
        $role = $this->role;

        return $role ? $role->item_name : '';
    }


    public function findByUsername($username){
        return static::findOne([
                'username' => $username,
            ]);
    }







    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('Используйте логин и пароль');
    }

    public function validatePassword($password)
    {
        
        if(Yii::$app->getSecurity()->validatePassword($password, $this->password)){
            return true;
        } 
        //return $this->password === $password;
    }
}
