<?php
use common\models\User;
use yii\helpers\Url;

/** @var User $user */
?>

<p>
    Для восстановления пароля к панели управления, пройдите по ссылке:
    <?= Url::to(['/password-reset', 'token' => $user->password_reset_token], true) ?>
</p>