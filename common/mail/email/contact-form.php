<?php

/** @var string $fullName
 *  @var string $subject
 *  @var string $email
 *  @var string $phone
 *  @var string $city
 *  @var string $message
 */
?>

<p>Тема обращения: <strong><?= $subject ?></strong></p>
<p>ФИО отправителя: <strong><?= $fullName ?></strong></p>
<p>Email отправителя: <strong> <?= $email ?></strong></p>
<p>Номер телефона отправителя: <strong><?= $phone ?></strong></p>
<p>Город отправителя: <strong><?= $city ?></strong></p>
<p><strong>Сообщение:</strong></p>
<p><?= $message ?></p>
