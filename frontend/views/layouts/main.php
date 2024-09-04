<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use frontend\assets\BackendAsset;

$bundle = AppAsset::register($this);
$backend = BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>


    <body>
    <?php $this->beginBody() ?>
    <header>
        header
    </header>

    <?= $content ?>
    <footer>
        footer
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
