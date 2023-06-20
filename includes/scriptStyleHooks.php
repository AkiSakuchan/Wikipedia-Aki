<?php

class scriptStyleHooks
{
    public static function onBeforePageDisplay(OutputPage $out, Skin $skin)
    {
        $out->addModules(['ext.mathJax' , 'ext.environmentStyles']);
    }
}