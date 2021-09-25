<?php
Session_start();
session_unset();
Session_destroy();
header('Location: index.php');
exit;
?>