<?php
session_start();
session_destroy();
// tekrar index sayfasına yönlendiriliyor.
header('Location: index.html');
?>