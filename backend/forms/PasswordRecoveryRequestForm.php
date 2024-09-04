<?php

namespace backend\forms;

use Yii;
use yii\base\Model;

use common\models\User;

/**
 * Форма для запроса на восстановление пароля
 *
 * @property User|null $user This property is read-only.
 *
 */
class PasswordRecoveryRequestForm extends Model
{
    public $email;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Почта',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function sendRecoveryMessage()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError('email', 'Пользователь с указанной почтой не найден');

                return false;
            }

            $user->generatePasswordResetToken();
            $user->save();

            return Yii::$app->mailService->sendMail(
                null,
                $user->email,
                'Запрос на восстановление пароля',
                'admin/recovery-password',
                [ 'user' => $user]
            );
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne([
                'email' => $this->email,
                'status' => User::STATUS_ACTIVE
            ]);
        }

        return $this->_user;
    }
}