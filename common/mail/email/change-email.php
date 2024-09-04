<?php
use common\models\User;
use yii\helpers\Url;

/** @var string $token */
?>

<p>
    Для подтверждения смены email перейдите по ссылке:
    <?= Url::to(['site/confirm-email', 'token' => $token], true) ?>
</p>
