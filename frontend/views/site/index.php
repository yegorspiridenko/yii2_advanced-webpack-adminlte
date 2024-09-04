<?php

/** @var yii\web\View $this
 * @var Page[] $articles
 * @var Banner $banner
 * @var MainPageReviewList[] $reviewLists
 * @var Product[] $hotProducts
 * @var Product[] $newProducts
 * @var Banner[] $banner
 * @var ProductCategory[] $productCategories
 * @var Page $page
 * @var MainPageReview[] $reviews
 * @var Topic[] $topics
 */

use common\helpers\MainPageHelper;
use common\models\Banner;
use common\models\MainPageReview;
use common\models\MainPageReviewList;
use common\models\Page;
use common\models\Product;
use common\models\Topic;
use common\models\ProductCategory;
use frontend\assets\AppAsset;
use frontend\assets\BackendAsset;
use pavlinter\display\DisplayImage;

$bundle = AppAsset::register($this);
$backendBundle = BackendAsset::register($this);
?>

<main class="main-page">
    <?php if ($banner): ?>
        <section class="banner">
            <div class="swiper-banner">
                <div class="swiper swiper-preview-desktop">
                    <div class="swiper-wrapper">
                        <?php foreach ($banner as $bannerBlock): ?>
                            <a href="<?= $bannerBlock->link ?>" target="_blank" class="swiper-slide">
                                <?= DisplayImage::widget([
                                    'width' => 3025,
                                    'height' => 1200,
                                    'image' => $bannerBlock->image_desktop ?? null,
                                    'mode' => DisplayImage::MODE_INSET,
                                    'category' => 'all',
                                ]) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper swiper-preview-mobile">
                    <div class="swiper-wrapper">
                        <?php foreach ($banner as $bannerBlock): ?>
                            <a href="<?= $bannerBlock->link ?>" target="_blank" class="swiper-slide">
                                <?= DisplayImage::widget([
                                    'width' => 576,
                                    'height' => 330,
                                    'image' => $bannerBlock->image_mobile ?? null,
                                    'mode' => DisplayImage::MODE_INSET,
                                    'category' => 'all',
                                ]) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-desktop"></div>
            <div class="swiper-pagination-mobile"></div>
        </section>
    <?php endif; ?>
    <?php if (!empty($hotProducts)) : ?>
        <?= $this->render('/components/_product-list', [
            'products' => $hotProducts,
            'title' => 'Лидеры продаж',
            'id' => 'hot',
        ]) ?>
    <?php endif; ?>
    <?php if (!empty($newProducts)) : ?>
        <?= $this->render('/components/_product-list', [
            'products' => $newProducts,
            'title' => 'Новинки',
            'id' => 'new',
        ]) ?>
    <?php endif; ?>
    <?php if (!empty($productCategories)): ?>
        <section class="main__catalog">
            <div class="main__title">
                <h1>Каталог</h1>
            </div>
            <div class="main__content-catalog">
                <?php foreach ($productCategories as $key => $category) : ?>
                    <a href="/catalog/categories/<?= $category->slug ?>"
                       class="main__content-item box_filter-hover">
                        <?php if (!empty($category->image)) : ?>
                            <?= DisplayImage::widget([
                                'width' => MainPageHelper::calculateCategoryImageWidth($key, count($productCategories)),
                                'height' => 820,
                                'image' => $category->image,
                                'category' => 'all',
                                'mode' => DisplayImage::MODE_INSET,
                                'options' => [
                                    'class' => 'content-catalog__img-desktop',
                                ],
                            ]) ?>
                            <?= DisplayImage::widget([
                                'width' => ($key == 0) ? 576 : 280,
                                'height' => ($key == 0) ? 520 : 368,
                                'image' => $category->image_mobile ?? $category->image,
                                'category' => 'all',
                                'mode' => DisplayImage::MODE_INSET,
                                'options' => [
                                    'class' => 'content-catalog__img-mobile',
                                ],
                            ]) ?>
                        <?php endif; ?>
                        <h2 class="badge"><?= $category->title ?></h2>
                        <div class="main__catalog-link--icon">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="20"
                                      transform="matrix(1 -8.74228e-08 -8.74228e-08 -1 0 40)"
                                      fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M20.1446 13.2424C20.563 12.8819 21.1945 12.9289 21.555 13.3473L26.7576 19.3855C27.0824 19.7625 27.0806 20.3209 26.7534 20.6958L21.5508 26.6575C21.1877 27.0736 20.556 27.1166 20.1399 26.7535C19.7238 26.3903 19.6808 25.7586 20.0439 25.3425L23.8001 21.0383H14C13.4477 21.0383 13 20.5906 13 20.0383C13 19.486 13.4477 19.0383 14 19.0383H23.8184L20.0398 14.6528C19.6793 14.2344 19.7262 13.6029 20.1446 13.2424Z"
                                      fill="black"/>
                            </svg>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if (!empty($articles)): ?>
        <?= $this->render('/components/_journal-list', [
            'articles' => $articles,
            'isShowAllArticlesLink' => true,
        ]) ?>
    <?php endif; ?>
    <?php if (!empty($reviews)): ?>
        <?= $this->render('/components/_review-list', [
            'reviews' => $reviews
        ]) ?>
    <?php endif; ?>
</main>

<section role="dialog" id="modal-create-preorder" aria-modal="true"></section>
