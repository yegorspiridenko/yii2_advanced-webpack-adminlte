<?php

/** @var yii\web\View $this
 */

use frontend\assets\AppAsset;
use frontend\assets\BackendAsset;

$bundle = AppAsset::register($this);
$backendBundle = BackendAsset::register($this);
?>

<main>
    main page
</main>
