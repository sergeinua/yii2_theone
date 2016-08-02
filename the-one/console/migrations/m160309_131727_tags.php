<?php

use yii\db\Migration;

class m160309_131727_tags extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tags}}', [
            'id'      => $this->string(255)->unique(),
            'name'           => $this->string(64),
        ], $tableOptions);

        $this->addPrimaryKey('places_place_id','place',['place_id']);

        $this->createTable('{{%country}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255),

        ]);

        $this->createTable('{{%city}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255),
        ]);
    }

    public function down()
    {
        echo "m160309_131727_tags cannot be reverted.\n";

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
