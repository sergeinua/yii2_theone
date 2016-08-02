<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m151029_125147_all_the_user_migrations
 */
class m151029_125147_all_the_user_migrations extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //Additional info for users.
        $this->createTable('{{%user_professional_info}}', [
            'user_id'               => $this->primaryKey(),
            'views'                 => $this->bigInteger(),
            'rate_average'          => $this->smallInteger(2),
            'organisation_name'     => $this->string(255)->notNull(),

            'organisation_info'     => $this->text(),
            'likes'                 => $this->bigInteger(),
            'website'               => $this->string(64),
            'lat'                   => $this->float(6),
            'lng'                   => $this->float(6),
            'soc_vk'                => $this->string(255),
            'soc_tw'                => $this->string(255),
            'soc_fb'                => $this->string(255),
            'soc_i'                => $this->string(255),
            'soc_vim'               => $this->string(255),
            'adress'                => $this->string(255),
            'role'                  => $this->string(20),
            'views_delta'           => $this->integer(),
            'likes_delta'            => $this->integer(),
            'hidden_order_parameter'=> $this->integer(),


        ], $tableOptions);
        $this->addForeignKey('user_professional_infoFK','user_professional_info','user_id',"user","id");

        //User media
        $this->createTable('{{%user_media}}',[
            'user_id'               => $this->integer(),
            'url'                   => $this->string(128),
            'type'                  => $this->string(64),
            'thumbnail_url'         =>$this->string(255),
            'order'         =>$this->integer()
        ],$tableOptions);

        $this->addForeignKey('user_mediaFK','user_media','user_id',"user","id");

        // Weds events
        $this->createTable('{{user_weds_events}}',[
            'user_id'=>$this->integer(),
            'event_name'=>$this->string(255),
            'date'=>$this->timestamp(),
        ],$tableOptions);
        $this->addForeignKey('user_weds_eventsFK','user_weds_events','user_id',"user","id");

        //User tags
//        $this->createTable('{{%user_tags}}',[
//            'id'=>$this->primaryKey(),
//            'value'=>$this->string(32)->unique(),
//        ],$tableOptions);

        //Connection with tags and user
//        $this->createTable('{{%user_to_tag}}',[
//            'user_id'=>$this->integer(),
//            'tag_id'=>$this->integer(),
//        ],$tableOptions);
//        $this->addForeignKey('user_tagsFK_user','user_to_tag','user_id',"user","id");
//        $this->addForeignKey('user_tagsFK_tags','user_to_tag','tag_id',"user_tags","id");

        //Connection from user to favourite professionals
        $this->createTable('{{%user_to_fav_professional}}',[
            'user_id'=>$this->integer(),
            'professional_id'=>$this->integer(),
        ],$tableOptions);
//        $this->addForeignKey('user_to_fav_professionalFK_user','user_to_fav_professional','user_id',"user","id");
//        $this->addForeignKey('user_to_fav_professionalFK_professional','user_to_fav_professional','professional_id',"user","id");

        //Professional group
        $this->createTable('{{%professional_group}}',[
            'id'                => $this->primaryKey(),
            'name'              => $this->string(255),
            'description'       => $this->text(),
            'slug'              => $this->string(64)
        ],$tableOptions);

        //Connection from group to user
        $this->createTable('{{%group_to_professional}}',[
            'user_id'           => $this->integer(),
            'group_id'          => $this->integer(),
        ],$tableOptions);

//        $this->addForeignKey('group_to_professionalFK_user','group_to_professional','user_id',"user","id");
//        $this->addForeignKey('group_to_professionalFK_group','group_to_professional','group_id',"professional_group","id");
//
        //Likes to user connection
        $this->createTable('{{%user_likes_to_pro}}',[
            'user_id'                   => $this->integer(),
            'professional_id'           => $this->integer(),
        ],$tableOptions);

//        $this->addForeignKey('user_likes_to_proFK_user','user_likes_to_pro','user_id',"user","id");
//        $this->addForeignKey('user_likes_to_proFK_professional','user_likes_to_pro','professional_id',"user","id");

        //User comments
        $this->createTable('{{%comment}}',[
            'id'                        => $this->primaryKey(10),
            'user_author_id'            => $this->integer(),
            'user_professional_id'      => $this->integer(),
            'rate'                      => $this->smallInteger(2),
            'date'                      => $this->timestamp(),
            'title'                     => $this->string(255),
            'text'                      => $this->text(),
            'parent_id'                 => $this->integer()
        ],$tableOptions);

//        $this->addForeignKey('commentsFK_user_author','comment','user_author_id',"user","id");
//        $this->addForeignKey('commentsFK_user_professional','comment','user_professional_id',"user","id");

        $this->createTable('{{%user_rating_delta}}',[
            'user_professional_id'      => $this->integer(),
            'dalta'                      => $this->float(2),
        ],$tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_professional_info}}');
        $this->dropTable('{{%user_media}}');
        $this->dropTable('{{%weds_events}}');
        $this->dropTable('{{%user_tags}}');
        $this->dropTable('{{%user_to_tag}}');
        $this->dropTable('{{%user_to_fav_professional}}');
        $this->dropTable('{{%group}}');
        $this->dropTable('{{%group_to_professional}}');
        $this->dropTable('{{%likes_to_user}}');
        $this->dropTable('{{%comments}}');
        $this->dropTable('{{%user_rating_delta}}');

        echo "m151029_125147_all_the_user_migrations cannot be reverted.\n";

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
