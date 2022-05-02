<?php
session_start();
extract($_SESSION);
require_once('Core/config.php');
if(!isset($code))
{
    echo "<script>location.href='".PATH."'</script>";
    die();
}
?>