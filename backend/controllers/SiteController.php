<?php

namespace backend\controllers;

use backend\components\AdminBaseController;
use backend\forms\ChangeAdminPasswordForm;
use backend\forms\LoginForm;
use backend\forms\PasswordRecoveryRequestForm;
use backend\forms\PasswordResetForm;
use common\models\User;
use Yii;
use yii\web\ErrorAction;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends AdminBaseController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
                'layout' => 'blank'
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('/order/index');
    }

    /**
     * Изменение данных администратора
     *
     * @return string|Response
     */
    public function actionUpdateUser()
    {
        $model = User::findOne(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Сохранение успешно!');
            return $this->refresh();
        }
        return $this->render('update-user', [
            'model' => $model
        ]);
    }

    /**
     * Смена пароля администратора
     *
     * @return string|Response
     */
    public function actionChangePassword()
    {
        $form = new ChangeAdminPasswordForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /** @var User $user */
            $user = User::findOne(Yii::$app->user->id);
            $user->setPassword($form->new_password);
            $user->save(false);
            Yii::$app->session->setFlash('success', 'Сохранение успешно!');

            return $this->refresh();
        }
        return $this->render('change-password', [
            'changePasswordForm' => $form
        ]);
    }

    /**
     * Запрос на восстановление пароля
     */
    public function actionPasswordRecovery()
    {
        $model = new PasswordRecoveryRequestForm();
        $this->layout = 'blank';

        if ($model->load(Yii::$app->request->post()) && $model->sendRecoveryMessage()) {
            return $this->render('recovery-password-success');
        }

        return $this->render('recovery-password', [
            'model' => $model
        ]);
    }

    /**
     * Сброс пароля
     *
     * @param $token
     * @return string|Response
     */
    public function actionPasswordReset($token)
    {
        $user = User::findByPasswordResetToken($token);
        $this->layout = 'blank';

        if (!$user || !$user->isPasswordResetTokenValid()) {
            return $this->redirect('/login');
        }

        $model = new PasswordResetForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Пароль успешно изменен!');
            return $this->redirect('login');
        }

        return $this->render('reset-password', [
            'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
