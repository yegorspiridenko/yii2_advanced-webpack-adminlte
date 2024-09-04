<?php

/* @var $this \yii\web\View */
/* @var $image string */
/* @var $label string */
/* @var $formName string */
/* @var $rootClass string */

use pavlinter\display\DisplayImage;
use yii\web\View;

$label = $label ?? 'Изображение';
$rootClass = $rootClass ?? null;

$this->registerJs(
    "initImageSelector('" . $formName . "', '" . $rootClass . "');",
    View::POS_READY
);
?>
<div class="form-group">
    <label class="control-label"><?= $label ?> (PNG, JPG)</label>
    <div class="d-flex align-items-center">
        <div class="image-list <?= $rootClass ?>">
            <?php if ($image) : ?>
                <div class="image-list__item mr-4">
                    <a data-fancybox="gallery" data-src="<?= $image ?>">
                        <?= DisplayImage::widget([
                            'width' => 120,
                            'height' => 120,
                            'image' => $image,
                            'category' => 'all'
                        ]) ?>
                    </a>
                    <input type="hidden" name="<?= $formName?>" value="<?= $image ?>">
                    <div class="delete-gallery-image <?= $rootClass ?> btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="btn btn-primary add-image <?= $rootClass ?>">Добавить изображение</div>
    </div>
</div>
