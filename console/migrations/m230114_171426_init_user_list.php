<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m230114_171426_init_user_list
 */
class m230114_171426_init_user_list extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $admin = new User();
        $admin->username = "admin";
        $admin->email = "admin@admin.com";
        $admin->status = User::STATUS_ACTIVE;
        $admin->setPassword("admin2023!");
        $admin->generateAuthKey();
        $admin->generateEmailVerificationToken();

        $admin->save();

        $manager = new User();
        $manager->username = "manager";
        $manager->email = "manager@manager.com";
        $manager->status = User::STATUS_ACTIVE;
        $manager->setPassword("manager2023!");
        $manager->generateAuthKey();
        $manager->generateEmailVerificationToken();

        $manager->save();

        $user1 = new User();
        $user1->username = "user_1";
        $user1->email = "user_1@mail.com";
        $user1->status = User::STATUS_ACTIVE;
        $user1->setPassword("user1!");
        $user1->generateAuthKey();
        $user1->generateEmailVerificationToken();

        $user1->save();

        $user2 = new User();
        $user2->username = "user_2";
        $user2->email = "user_2@mail.com";
        $user2->status = User::STATUS_ACTIVE;
        $user2->setPassword("user2!");
        $user2->generateAuthKey();
        $user2->generateEmailVerificationToken();

        $user2->save();
    }

    public function down()
    {
        echo "m230114_171426_init_user_list cannot be reverted.\n";

        return false;
    }
}
