<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m231107_095345_insert_default_admin_user
 */
class m231107_095345_insert_default_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(User::tableName(), [
            'username' => 'admin',
            'auth_key' => '',
            'password_hash' => '$2y$13$YR8vM7kMXhjIa7hnxkaV5.qHtxTlj0BnQyvrfFSDz9.C5iAMnyJRK',
            'email' => 'admin@admin.ru',
            'status' => User::STATUS_ACTIVE,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(User::tableName(), ['username' => 'admin']);
    }
}
