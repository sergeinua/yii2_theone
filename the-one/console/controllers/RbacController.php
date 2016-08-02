<?php
namespace console\controllers;

use console\rbac\rules\ActivatedRule;
use console\rbac\rules\EditOwnInformationRule;
use Yii;
use yii\console\Controller;
use yii\rbac\PhpManager;

class RbacController extends Controller
{
    public function actionInit(){

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        /**
         *
         * Гость.Может ничего.
         *
         */

//        $guest = $auth->createRole('guest');
//        $guest->description = "Гость";


        /**
         *
         * Пользователь.Может лайкать и писать комменты.Еще может выбрать дату праздника.Хз зачем,правда
         *
         */

        $user = $auth->createRole('user');
        $user->description = "Пользователь";

            $likeAndFollow = $auth->createPermission('likeAndFollow');
            $auth->add($likeAndFollow);


            $activatedRule = new ActivatedRule();
            $auth->add($activatedRule);
            $activatedPermission = $auth->createPermission('activated');
            $activatedPermission->description = "Пользователь активирован";
            $activatedPermission->ruleName = $activatedRule->name;
            $auth->add($activatedPermission);

        $auth->add($user);
        $auth->addChild($user,$activatedPermission);
        $auth->addChild($user,$likeAndFollow);
        /**
         *
         * Профессионал. Может редактировать информацию о себе,как о профессионале.
         *
         */

        $professional = $auth->createRole('professional');
        $professional->description = "Профессионал";
            /**
             * Возможность редактировать информацию о себе
             */
            $editOwnInformationRule = new EditOwnInformationRule();
            $auth->add($editOwnInformationRule);

            $editOwnInformationPermission = $auth->createPermission('editOwnInformation');
            $editOwnInformationPermission->description = 'Редактировать свою информацию';
            $editOwnInformationPermission->ruleName = $editOwnInformationRule->name;
            $auth->add($editOwnInformationPermission);

        $auth->add($professional);
        $auth->addChild($professional,$user);
        $auth->addChild($professional,$editOwnInformationPermission);




        /**
         *
         * Редактор. Может создавать статьи.Редактирование пользователей и прочей накрутки лайков ему не доступно.
         *
         */

        $author = $auth->createRole('author');
        $author->description = "Автор";
            /**
             * Возможность добавлять статьи
             */
            $addPostsPermission = $auth->createPermission('addPosts');
            $addPostsPermission->description = 'Добавлять статьи';
            $auth->add($addPostsPermission);

        $auth->add($author);

        $auth->addChild($author,$professional);
        $auth->addChild($author,$addPostsPermission);

        /**
         *
         * Суперадминистратор.Может всё.
         *
         *
         */

        $superAdmin = $auth->createRole('admin');
        $superAdmin->description = "Админ";
            /**
             * Возможность редактировать информацию о пользователях
             */
            $editUsersInformationPermission = $auth->createPermission('editUsersInformation');
            $editUsersInformationPermission->description = 'Возможность редактировать информацию о пользователях';
            $auth->add($editUsersInformationPermission);

        $auth->add($superAdmin);
        $auth->addChild($superAdmin,$author);



    }
}