<?php

namespace common\helpers;

use frontend\assets\AppAsset;

class SVGHelper
{
    /**
     * Получение svg по названию файла
     *
     * @param string $fileName
     * @param AppAsset $bundle
     * @return string
     */
    public static function getSVG(string $fileName, AppAsset $bundle): string
    {
        return file_get_contents("{$bundle->basePath}/build/img/svg/{$fileName}.svg");
    }
}