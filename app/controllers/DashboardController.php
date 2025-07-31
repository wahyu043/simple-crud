<?php

class DashboardController extends Controller
{
    public function index()
    {
        // Session sudah otomatis aktif dari config.php
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $this->view('dashboard/index', [
            'username' => $_SESSION['user']
        ]);
    }
}
