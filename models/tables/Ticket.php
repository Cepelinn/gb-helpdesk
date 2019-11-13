<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use app\models\user\UserRecord;


/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $description
 * @property int $responsible_id
 * @property int $status_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserRecord $responsible
 * @property UserRecord $author
 * @property Status $status
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'title'], 'required'],
            [['author_id', 'responsible_id', 'status_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRecord::className(), 'targetAttribute' => ['responsible_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRecord::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'description' => 'Description',
            'responsible_id' => 'Responsible ID',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'authorName' => 'Author Name',
            'responsibleName' => 'Responsible Name',
            'statusName' => 'Status Name',
        ];
    }



    public function beforeSave($insert)
    {


        $return = parent::beforeSave($insert);
        
        $arr = Yii::$app->request->post('Ticket');
        if (array_key_exists ('responsibleName' ,$arr ) && $arr['responsibleName'] != ""){
            $resName = $arr['responsibleName'];
            $res = UserRecord::find()->where(['username' => $resName])->one();
            $this->responsible_id = $res->id;
        } else {
            $this->responsible_id = '';
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

    public function getStatus()
    {
        return $this->hasOne(TicketStatus::className(), ['id' => 'status_id']);
    }

    public function getStatusName()
    {
        $status = $this->status;

        return $status ? $status->title : '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getUsers()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'author_id']);
    }

    public function getResponsible()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'responsible_id']);
    }


    public function getResponsibleName()
    {
        $responsible = $this->responsible;

        return $responsible ? $responsible->username : '';

        //return $responsible ? $responsible->username : 'не определен';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(UserRecord::className(), ['id' => 'author_id']);
    }

    public function getAuthorName()
    {
        $author = $this->author;

        return $author ? $author->username : '';
    }



}
