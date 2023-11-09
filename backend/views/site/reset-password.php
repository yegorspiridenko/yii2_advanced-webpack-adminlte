<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model backend\forms\PasswordResetForm */

$this->title = 'Панель администратора | Восстановление пароля';
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><?= Yii::$app->params['appName'] ?><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p>Укажите новый пароль</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <div class="row">
            <div class="col-12">
                <?= $form
                    ->field($model, 'password', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
                    ])
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('password'), 'type' => 'password']) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?= $form
                    ->field($model, 'passwordRepeat', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
                    ])
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('passwordRepeat'), 'type' => 'password']) ?>
            </div>
        </div>



        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <?= Html::submitButton('Обновить пароль', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->