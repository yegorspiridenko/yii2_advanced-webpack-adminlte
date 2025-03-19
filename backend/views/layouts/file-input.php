<?php

/**
 * Вьюшка кастомного инпута файлов
 *
 * @var $this View
 * @var $label string
 * @var $formName string
 * @var $rootClass string
 * @var $file string
 */

use yii\helpers\Html;
use yii\web\View;

$label = $label ?? 'Файл';
$rootClass = $rootClass ?? null;
$isMultiple = !empty($isMultiple);

$this->registerJs(
    "initFileSelector('" . $formName . "', '" . $rootClass . "');",
    View::POS_READY
);
?>
<div class="form-group">
    <label class="control-label"><?= $label ?></label>
    <div class="file-input <?= $rootClass ?>">
        <?= Html::input(
            'text',
            $formName,
            $file,
            [
                'readonly' => true,
                'class' => 'form-control'
            ]
        ) ?>
        <div class="btn btn-primary add-file <?= $rootClass ?>"><i class="fas fa-upload"></i></div>
        <div class="btn btn-danger delete-file <?= $rootClass ?>"><i class="fas fa-trash"></i></div>
    </div>
</div>
