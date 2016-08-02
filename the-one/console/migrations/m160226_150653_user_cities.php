<?php

use yii\db\Migration;

class m160226_150653_user_cities extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%place}}', [
            'place_id'      => $this->string(255)->unique(),
            'lat'           => $this->float(9),
            'lng'           => $this->float(9),
            'address'        => $this->string(255),
            'country_id'    => $this->integer(),
            'city_id'       => $this->integer(),

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

        $this->dropTable('places');
        $this->dropTable('countries');
        $this->dropTable('cities');
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
