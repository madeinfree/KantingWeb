<?php
session_start();
unset($_SESSION['id']);
echo '<meta http-equiv="refresh" content="0;url=index.php">';
?>
