<?php
/* @var $content string */

use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <?= Alert::widget(
                    [
                        'options' => [
                            'class' => 'alert-success',
                        ],
                        'body' => Yii::$app->session->getFlash('success'),
                    ]
                ) ?>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <?= Alert::widget(
                    [
                        'options' => [
                            'class' => 'alert-error',
                        ],
                        'body' => Yii::$app->session->getFlash('error'),
                    ]
                ) ?>
            <?php endif; ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php
                        if (!is_null($this->title)) {
                            echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <?= $content ?><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>