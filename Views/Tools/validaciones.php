<?php

    function isVoid($variable)
    {
        return empty(trim($variable));
    }
    function isMail($variable)
    {
        return filter_var($variable,FILTER_VALIDATE_EMAIL);
    }
    function isPass($variable)
    {
        return preg_match('/^[a-zA-Z0-9()._,*%&#@=?¿$;ª!|]{8,20}$/',$variable);
    }
    function isEntero($variable)
    {
        return preg_match('/^[0-9]{6}$/',$variable);
    }

    function isProduct($variable)
    {
        return preg_match('/^PROD[0-9]{3}$/',$variable);
    }
    function isText($variable)
    {
        return preg_match('/^(([a-zA-Záéíóúñ0-9_.\-\,()?]+)[ ]?([a-zA-Záéíóúñ0-9_.\-\,()?]+)?)+$/',$variable);
    }
    function isInteger($variable)
    {
        return preg_match('/^[0-9]+$/',$variable);
    }
    function isFloat($variable)
    {
        return preg_match('/^[0-9]+[.]?([0-9]+)?$/',$variable);
    }
    function isAccept($variable)
    {
        if(preg_match('/\.(jpe?g|png|webp)$/',$variable))
        {
            return true;
        }
        else{
            return false;
        }
    }
