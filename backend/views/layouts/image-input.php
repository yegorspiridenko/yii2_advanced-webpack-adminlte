<?php

/**
 * Вьюшка кастомного инпута изображений
 *
 * @var $this View
 * @var $label string
 * @var $formName string
 * @var $rootClass string
 * @var $isMultiple null|boolean
 * @var $images array
*/

use yii\web\View;

$label = $label ?? 'Изображение';
$rootClass = $rootClass ?? null;
$isMultiple = !empty($isMultiple);

$this->registerJs(
    "initImageSelector('" . $formName . "', '" . $rootClass . "', '" . $isMultiple . "');",
    View::POS_READY
);
?>
<div class="form-group">
    <label class="control-label"><?= $label ?></label>
    <div class="image-list-wrapper">
        <div class="image-list <?= $rootClass ?>" id="sortable-<?= $rootClass ?>">
            <?php if (!empty($images)) : ?>
                <?php foreach ($images as $image): ?>
                    <?= $this->render('image-preview', [
                        'image' => $isMultiple ? $image->url : $image,
                        'formName' => $formName,
                        'rootClass' => $rootClass
                    ]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="btn btn-primary add-image <?= $rootClass ?>">Добавить</div>
    </div>
</div>
