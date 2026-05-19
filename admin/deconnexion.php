<?php
session_start();
session_destroy();
echo "deconnecte avec succes";

header('location:index.php')
?>