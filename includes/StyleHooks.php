<?php

class StyleHooks
{
    public static function onBeforePageDisplay(OutputPage $out, Skin $skin)
    {
        $out->addModuleStyles('ext.Formule.styles');
    }
}