<?php
    // Скрипт проверки на наличие сессии
    function get_login_status()
    {
        include "db.php";
        if (!isset($_SESSION['id']) && !isset($_SESSION['login']))
        {
            return false;
        } else {
            return true;
        }
    }
?>