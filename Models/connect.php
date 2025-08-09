<?php

    function OpenDB()
    {
        return mysqli_connect("127.0.0.1:3307","root","","practicas13");
    }

    function CloseDB($context)
    {
        mysqli_close($context);
    }

    function RegistrarError($e)
    {
        // Guarda mensaje de error (Si pasara)
        error_log('[ABONOS] '.$e->getMessage());
        error_log($e->getTraceAsString());
    }
?>