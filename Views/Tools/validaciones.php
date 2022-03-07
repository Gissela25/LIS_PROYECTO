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