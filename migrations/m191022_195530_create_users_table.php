<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m191022_195530_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(45)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255),
            'accessToken' => $this->string(50),
            'name' => $this->string(50)->notNull(),
            'email' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

         $this->insert('users', [
            'username' => 'admin',
            'password' => '$2y$13$q6UKNTwmAt7Ljc76Lrd2Re4ah6h2pIhoqTn3gsosbt4WPG67makD2',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
            'name' => 'adminName',
            'email' => 'admin@admin.ru',
            'created_at' => '2019-10-22 11:30:45',
            'updated_at' => '2019-10-22 11:30:45',
        ]);

         $this->insert('users', [
            'username' => 'user',
            'password' => '$2y$13$9sTeJBvic/NaFi3zrZNvX.02IwR2.6kavQS0DoDREkf2qZqfpKPl6',
            'authKey' => '81dils-ytQSckRu_nQHC',
            'accessToken' => '',
            'name' => 'user',
            'email' => 'user@user.ru',
            'created_at' => '2019-10-22 11:30:45',
            'updated_at' => '2019-10-22 11:30:45',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
