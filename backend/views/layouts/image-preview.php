<?php

/**
 * Вьюшка компонента кастомного инпута изображений
 *
 * @var $image string
 * @var $formName string
 * @var $rootClass string
*/

use pavlinter\display\DisplayImage;

?>

<?php if ($image) : ?>
    <div class="image-list__item">
        <a data-fancybox="gallery" data-src="<?= $image ?>">
            <?= DisplayImage::widget([
                'width' => 85,
                'height' => 85,
                'image' => $image,
                'category' => 'all'
            ]) ?>
        </a>
        <input type="hidden" name="<?= $formName?>" value="<?= $image ?>">
        <div class="delete-gallery-image <?= $rootClass ?> btn btn-xs btn-danger">
            <i class="fas fa-trash"></i>
        </div>
    </div>
<?php endif; ?>
