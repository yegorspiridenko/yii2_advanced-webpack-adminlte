<?php
namespace backend\components;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;

class AdminBaseController extends Controller
{
    public $layout = 'main';
    public $pageTitle = '';
    public $smallTitle = '';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'error', 'password-recovery', 'password-reset'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
                    return Yii::$app->response->redirect(['/login']);
                },
            ],
        ];
    }

    public static function getMenu()
    {
        return [
            [
                'label' => 'Настройки',
                'icon' => 'cogs',
                'items' => [
                    [
                        'label' => 'Файловый менеджер',
                        'url' => ['/file-manager/index'],
                        'icon' => 'file',
                    ],
                    [
                        'label' => 'Смена пароля',
                        'url' => ['/site/change-password'],
                        'icon' => 'key',
                    ],
                    [
                        'label' => 'Изменение профиля',
                        'url' => ['/site/update-user'],
                        'icon' => 'user',
                    ],
                ]
            ]
        ];
    }
}
