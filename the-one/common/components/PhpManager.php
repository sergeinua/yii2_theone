<?php
namespace common\components;

use Yii;
use yii\base\InvalidParamException;
use yii\rbac\Assignment;

class PhpManager extends \yii\rbac\PhpManager

{
    /**
     * @var string
     */
    public $defaultRole = 'guest';

    /**
     * @var string
     */
    public $roleParam = 'role';

    /**
     * @inheritdoc
     */
    /*public function init()
    {

        if ($this->authFile === NULL){
            $this->authFile = Yii::getAlias('@console/rbac/items') . '.php';
            $this->aItems=$this->loadFromFile($this->authFile);
        }

        parent::init();
    }*/

    /**
     * @inheritdoc
     */
    /*public function assign($role, $userId)
    {
        $role = $role->name;
        if (!isset($this->aItems[$role])) {
            throw new InvalidParamException("Unknown role '{$role}'.");
        } elseif (isset($this->assignments[$userId][$role])) {
            throw new InvalidParamException("Authorization item '{$role}' has already been assigned to user '$userId'.");
        } else {
            $this->assignments[$userId][$role] = new Assignment([
                'userId' => $userId,
                'roleName' => $role,
                'createdAt' => time(),
            ]);
            $this->saveAssignments();
            return $this->assignments[$userId][$role];
        }
    }*/

    /**
     * Recursively finds all children and grand children of the specified item.
     *
     * @param string $name the name of the item whose children are to be looked for.
     * @param array $result the children and grand children (in array keys)
     */
    /*public function getChildrenRecursive($name, &$result)
    {
        if (isset($this->aItems[$name]['children'])) {
            foreach ($this->aItems[$name]['children'] as $child) {
                $result[] = $child;
                $this->getChildrenRecursive($child, $result);
            }
        }else{
            $result[] = $name;
        }
    }*/

    public function getAssignments($userId)
    {
        $user = Yii::$app->getUser();
        if($user->isGuest){
            $assignment = new Assignment;
            $assignment->userId = $userId;
            $assignment->roleName = $this->defaultRole;
            $assignments[$assignment->roleName] = $assignment;
            return $assignments;
        }
        /** @var IdentityInterface|ActiveRecord|null $identity */
        $identity = $user->getIdentity();
        $assignments = parent::getAssignments($userId);
        $model = $userId === $user->getId()
            ? $identity
            : $identity::findOne($userId);
        if ($model) {
            $assignment = new Assignment;
            $assignment->userId = $userId;
            $assignment->roleName = $model->{$this->roleParam};
            $assignments[$assignment->roleName] = $assignment;
        }
        return $assignments;
    }}