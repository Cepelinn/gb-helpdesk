<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ticket}}`.
 */
class m191029_083310_create_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('ticket', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255),
            'responsible_id' => $this->integer()->null(),
            'status_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);


         $this->insert('ticket', [
            'author_id' => '1',
            'title' => 'Тема',
            'description' => 'Описание',
            'responsible_id' => '1',
            'status_id' => '1',
            'created_at' => '2019-10-22 11:30:45',
            'updated_at' => '2019-10-22 11:30:45',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('ticket');
    }
}
