<?php

namespace frontend\assets;

use kartik\select2\ThemeAsset;

class Select2ThemeAsset extends ThemeAsset
{
    public function init()
    {
        $this->setSourcePath('@app/assets/build');
        $this->initTheme();
        $this->setupAssets('css', ['app']);
        parent::init();
    }
}
