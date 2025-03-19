<?php
namespace common\helpers;

use pavlinter\display\DisplayImage;

/**
 * Вспомогательные функции для таблицы
 */

class GridViewHelper
{
    /**
     * Генерация булевого столбца is_active
     *
     * @return array
     */
    public static function getBoolColumn(string $attributeName = 'is_active'): array
    {
        return [
            'attribute' => '$attributeName',
            'format' => 'raw',
            'value' => function ($model) use ($attributeName) {
                $class = $model[$attributeName] ? 'badge-success' : 'badge-danger';
                $text = $model[$attributeName] ? 'Да' : 'Нет';

                return '<span class="badge ' . $class . '">' . $text . '</span>';
            },
            'filter' => [
                0 => 'Нет',
                1 => 'Да'
            ]
        ];
    }

    /**
     * Генерация столбца с изображением (image и т.п.)
     *
     * @param string $attributeName
     * @return array
     */
    public static function getImageColumn(string $attributeName = 'image'): array
    {
        return [
            'attribute' => $attributeName,
            'format' => 'raw',
            'contentOptions' => ['class' => 'text-center'],
            'value' => function ($model) use ($attributeName) {
                return DisplayImage::widget([
                    'width' => 31,
                    'height' => 31,
                    'image' => $model[$attributeName],
                    'category' => 'all'
                ]);
            },
        ];
    }
}
