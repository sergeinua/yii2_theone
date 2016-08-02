<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_120929_magazine extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Articles

        $this->createTable('{{%magazine}}', [
            'id'                         => $this->primaryKey(),
            'name'                       => $this->string(255),
            'price'                      => $this->string(255),
            'shortdesc'                  => $this->string(255),
            'content'                    => $this->text(),
            'announcement'               => $this->text(),
            'cover'                      => $this->string(255),
            'issuu'                      => $this->text(),
            'journals_ua'                =>$this->string(255),
            'created'                    => $this->bigInteger(),
            'updated'                    => $this->bigInteger(),

        ], $tableOptions);
    }

    public function down()
    {
        echo "m151224_120929_magazine cannot be reverted.\n";

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
