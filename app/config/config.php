<?php
define('BASE_URL', 'http://localhost:8888/simple-crud-mvc/public');

// Start session global
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
