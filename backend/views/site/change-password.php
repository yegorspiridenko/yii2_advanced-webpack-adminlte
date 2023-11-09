<?php
/** @var ChangeAdminPasswordForm $changePasswordForm
 *  @var View $this
 */


use backend\forms\ChangeAdminPasswordForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Смена пароля администратора';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <?php $form = ActiveForm::begin(['id' => 'change-admin-password-form']) ?>

            <?= $form->field($changePasswordForm, 'old_password')->passwordInput() ?>

            <?= $form->field($changePasswordForm, 'new_password')->passwordInput() ?>

            <?= $form->field($changePasswordForm, 'new_password_repeat')->passwordInput() ?>

            <div class="row">
                <div class="col-4">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>