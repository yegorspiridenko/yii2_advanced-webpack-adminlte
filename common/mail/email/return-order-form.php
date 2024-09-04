<?php
/**
 * @var Order $order
 * @var string $subject
 * @var string $fullName
 * @var string $email
 * @var string $phone
 * @var string $message
 */

use common\models\Order;

?>
<p>Номер заказа: <strong>№<?= $order->id ?></strong></p>
<p>Тема обращения: <strong><?= $subject ?></strong></p>
<p>ФИО отправителя: <strong><?= $fullName ?></strong></p>
<p>Email отправителя: <strong> <?= $email ?></strong></p>
<p>Номер телефона отправителя: <strong><?= $phone ?></strong></p>
<p><strong>Сообщение:</strong></p>
<p><?= $message ?></p>
<table rules="all" style="border: 1px solid #666; padding-top: 5px" cellpadding="5">
    <tr style="background: #eee">
    <tr>
        <th>Товар</th>
        <th>Размер</th>
        <th>Цвет</th>
        <th>Количество</th>
        <th>Стоимость</th>
    </tr>
    <?php foreach ($order->orderItems as $orderItem) : ?>
        <tr>
            <td><?= $orderItem->title ?></td>
            <td><?= $orderItem->size ? 'Размер ' . $orderItem->size : '' ?></td>
            <td><?= $orderItem->color ? 'Цвет ' . $orderItem->color : '' ?></td>
            <td><?= $orderItem->quantity ?></td>
            <td><?= $orderItem->total_price ?></td>
        </tr>
    <?php endforeach; ?>
    <?php if ($order->delivery_method !== Order::DELIVERY_METHOD_PICKUP): ?>
        <tr>
            <th colspan="4">Доставка</th>
            <td><?= $order->delivery_price ?></td>
        </tr>
    <?php endif; ?>
    <tr>
        <th colspan="4">Итого</th>
        <td><?= $order->total_price ?></td>
    </tr>
</table>

