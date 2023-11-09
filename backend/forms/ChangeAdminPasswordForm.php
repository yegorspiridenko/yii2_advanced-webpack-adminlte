<?php

namespace backend\forms;

use common\models\User;
use Yii;

/**
 * Class ChangeAdminPasswordForm
 * @package backend/forms
 */
class ChangeAdminPasswordForm extends User
{
    public $old_password;
    public $new_password;
    public $new_password_repeat;

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'new_password_repeat'], 'required'],
            [['new_password_repeat'], 'compare', 'compareAttribute' => 'new_password', 'message' => 'Повтор пароля не совпадает'],
            [['old_password'], 'checkOldPassword']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'old_password' => 'Старый пароль',
            'new_password' => 'Новый пароль',
            'new_password_repeat' => 'Повторите пароль'
        ];
    }

    /**
     * @param $attribute
     */
    public function checkOldPassword($attribute)
    {
        if (!Yii::$app->security->validatePassword($this->$attribute, Yii::$app->user->getIdentity()->password_hash)) {
            $this->addError($attribute, Yii::t('interface', 'Старый пароль указан неверно'));
        }
    }

}