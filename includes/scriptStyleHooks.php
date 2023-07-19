<?php

class scriptStyleHooks
{
    public static function onBeforePageDisplay(OutputPage $out, Skin $skin)
    {
        $out->addModules(['ext.environmentStyles']);
        $path = 'extensions/Wikipedia-Aki/resources/katex.css';
        $out->addHeadItem('katex-css', '<link rel="stylesheet" type="text/css" href="' . $path . '">');
    }
}