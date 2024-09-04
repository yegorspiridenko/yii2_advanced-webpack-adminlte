<?php
/* @var $this View */

use yii\web\View;

$this->title = 'Файловый менеджер';
$this->params['breadcrumbs'] = [['label' => $this->title]];

$this->registerJs("CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 700
} );", View::POS_READY);
?>

<div id="ckfinder-widget"></div>
