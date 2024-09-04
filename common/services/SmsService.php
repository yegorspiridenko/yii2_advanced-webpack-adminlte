<?php

namespace common\services;

use Yii;

class SmsService
{
    /**
     * Отправка SMS на указанный телефон
     *
     * @param string $to
     * @param string $text
     * @return string
     * @throws \Exception
     */
    public function sendSms(string $to, string $text): string
    {
        $link = "https://sms.ru/sms/send?to=" . $to . "&api_id=" . Yii::$app->params['smsServiceApiKey'] . "&msg=$text";
        $body = file_get_contents($link);
        $json = json_decode($body);

        if (!$json) {
            return "Запрос не выполнился. Не удалось установить связь с сервером.";
        }

        if ($json->status === "OK") {
            return $json->code;
        }

        throw new \Exception($json->status_text);
    }
}
