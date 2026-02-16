<?php
define('BASE_URL', 'http://simplemvc.local');

// Start session global
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
