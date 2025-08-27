<?php
session_start();
if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
 echo "OK";
} else {
 http_response_code(403);
 echo "Non autorisé";
}
