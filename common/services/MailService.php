<?php

namespace common\services;

use Yii;

class MailService
{
    /**
     * Базовая функция отправки письма
     *
     * @param null $from
     * @param $to
     * @param $subject
     * @param $template
     * @param array $templateParams
     * @return bool
     */
    public function sendMail($from, $to, $subject, $template, array $templateParams = []): bool
    {
        $from = $from ?: Yii::$app->params['senderEmail'];
        $fromName = Yii::$app->params['senderName'];

        // на локальном/тестовом сервере отправка письма всегда на почту админа
        if (YII_DEBUG) {
            $to = Yii::$app->params['adminEmail'];
        } else {
            if (is_array($to)) {
                foreach ($to as $key => $address) {
                    $to[$key] = trim($address);
                }
            } else {
                $to = trim($to);
            }
        }

        $message = Yii::$app->mailer->compose($template, $templateParams)
            ->setFrom([$from => $fromName])
            ->setTo($to)
            ->setSubject($subject)
        ;

        return $message->send();
    }
}
