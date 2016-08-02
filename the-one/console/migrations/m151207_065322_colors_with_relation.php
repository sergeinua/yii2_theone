<?php

use yii\db\Schema;
use yii\db\Migration;

class m151207_065322_colors_with_relation extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%color}}', [
            'id'                    => $this->primaryKey(),
            'hex'                 => $this->string(7)->notNull(),
            'name'                => $this->string(255),
            'slug'                  => $this->string(255)
        ], $tableOptions);

        $this->createTable('{{%color_to_article}}', [
            'color_id'                    => $this->integer(),
            'article_id'                 => $this->integer()
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151207_065322_colors_with_relation cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
