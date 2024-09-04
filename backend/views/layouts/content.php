<?php
/* @var $content string */

use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

?>
<div class="content-wrapper">
    <div class="content-header py-1">
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
            <div class="row">
                <div class="col-sm-2 p-0">
                    <?php if (isset($this->params['backUrl'])) {
                        echo Html::a(
                            "<i class='fa fa-arrow-left mr-1' style='vertical-align: middle;'></i> {$this->params['backUrl'][0]['label']}",
                            $this->params['backUrl'][0]['url'],
                            ['class' => 'btn btn-secondary btn-xs']
                        );
                    }
                    ?>
                </div>
                <div class="col-sm-10">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'homeLink' => false,
                        'options' => [
                            'class' => 'breadcrumb float-sm-right text-sm justify-content-end'
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>
