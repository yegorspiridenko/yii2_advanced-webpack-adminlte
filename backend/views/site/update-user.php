<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\User */

$this->title = 'Изменение данных администратора';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Основная информация</h3>
                </div>

                <?php $form = ActiveForm::begin([]); ?>

                <div class="card-body">
                    <?= $form
                        ->field($model, 'username')
                        ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

                    <?= $form
                        ->field($model, 'email')
                        ->textInput(['placeholder' => $model->getAttributeLabel('email'), 'type' => 'email']) ?>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
