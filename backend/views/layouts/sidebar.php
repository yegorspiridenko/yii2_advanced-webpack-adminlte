<?php

use backend\components\AdminBaseController;
use hail812\adminlte\widgets\Menu;

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Yii::$app->params['shortAppName'] ?> Admin</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <?= Menu::widget([ 'items' => AdminBaseController::getMenu() ]);
            ?>
        </nav>
    </div>
</aside>