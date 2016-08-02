<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_084635_team extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Articles

        $this->createTable('{{%team}}', [
            'id'                    => $this->primaryKey(),
            'name'                  => $this->string(255),
            'photo'                  => $this->string(255),
            'profession'             => $this->string(255),
            'top_quote'               => $this->text(),
            'main_quote'               => $this->text(),
            'soc_tw'                  => $this->bigInteger(),
            'soc_fb'                  => $this->string(255),
            'soc_vk'                => $this->string(255),
            'soc_in'                 => $this->string(255),
            'slug'                   =>$this->string(255)
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%team}}');
        echo "Table 'team' has been dropped";
        return true;
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
