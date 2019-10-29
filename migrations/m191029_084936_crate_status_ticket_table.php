<?php

use yii\db\Migration;

/**
 * Class m191029_084936_crate_status_ticket_table
 */
class m191029_084936_crate_status_ticket_table extends Migration
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
        
        $this->createTable('ticket_status', [
            'id' => $this->primaryKey(),
            'title' => $this->string(30)->notNull()
        ], $tableOptions);

         $this->insert('ticket_status', [
            'title' => 'Тест Статус',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('ticket_status');
    }
}
