<?php
session_start();
$page = isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : 'index.php';
session_destroy();
header("Location: $page");
exit;
