<?php

namespace frontend\controllers;

use Yii;
use yii\captcha\CaptchaAction;
use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Экшн для страниц верстки
     *
     * @param $page
     * @return string
     */
    public function actionStatic($page): string
    {
        return $this->render('/static/' . $page);
    }
}
