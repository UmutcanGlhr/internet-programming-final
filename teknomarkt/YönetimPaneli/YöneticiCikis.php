<?php
unset($_SESSION["Yönetici"]);
session_destroy();
header("Location:index.php");
exit();

?>