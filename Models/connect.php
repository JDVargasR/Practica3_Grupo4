<?php

    function OpenDB()
    {
        return mysqli_connect("127.0.0.1:3307","root","","practicas13");
    }

    function CloseDB($context)
    {
        mysqli_close($context);
    }

   

?>