<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m230114_170503_init_rbac
 */
class m230115_170503_init_rbac extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $adminUser = User::findByUsername('admin');
        $managerUser = User::findByUsername('manager');

        $auth = Yii::$app->authManager;

        // add "createUser" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a user';
        $auth->add($createUser);

        // add "updateUser" permission
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update user';
        $auth->add($updateUser);

        // add "deleteUser" permission
        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Delete user';
        $auth->add($deleteUser);

        // add "manager" role and give this role the "createUser" permission
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $createUser);
        $auth->addChild($manager, $deleteUser);

        // add "admin" role and give this role the "updateUser" permission
        // as well as the permissions of the "manager" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $manager);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($manager, $managerUser->id);
        $auth->assign($admin, $adminUser->id);
    }

    public function down()
    {
        echo "m230114_170503_init_rbac cannot be reverted.\n";

        return false;
    }
}
