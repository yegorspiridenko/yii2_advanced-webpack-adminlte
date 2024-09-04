<?php

use common\models\User;
use \yii\db\Migration;

class m190124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn(User::tableName(), 'verification_token', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn(User::tableName(), 'verification_token');
    }
}
