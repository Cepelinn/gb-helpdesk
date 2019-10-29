<?php

namespace app\models\tables;

use Yii;

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
 * @property Users $responsible
 * @property Users $author
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
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['responsible_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['creator_id' => 'id']],
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
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(TicketStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Users::className(), ['id' => 'responsible_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['id' => 'author_id']);
    }

}
