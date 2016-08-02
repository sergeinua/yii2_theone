<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
//            'login' => $this->string()->notNull()->unique(),
            'username' => $this->string()->notNull()->unique(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'slug' => $this->string(64),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'type' => $this->integer(2)->notNull()->defaultValue(1),
            'phone' => $this->text(),
            'socials' => $this->text(),
            'contact_email' => $this->string(255),
            'adress' => $this->string(255),
            'lat_lng' => $this->string(128),
            'place_id' => $this->string(255),
            'wedding_date' => $this->integer(),
            'city_id' => $this->integer(),
            'country_id' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
