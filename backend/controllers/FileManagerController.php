<?php

namespace backend\controllers;

use backend\components\AdminBaseController;
use pavlinter\display\DisplayImage;
use Yii;
use yii\web\Response;

/**
 * FileManager controller
 */
class FileManagerController extends AdminBaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Генерация кропа изображения
     *
     * @param $url
     * @param string $category
     * @return array
     * @throws \Throwable
     */
    public function actionPreviewSrc($url, string $category = 'all'): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'preview' => DisplayImage::widget([
                'width' => 85,
                'height' => 85,
                'image' => $url,
                'category' => $category,
                'returnSrc' => true
            ]),
            'image' => $url
        ];
    }
}
