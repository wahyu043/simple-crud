<?php

class HomeController extends Controller
{
    public function index()
    {
        // Kalau belum login → ke login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }

        // Kalau sudah login → ke dashboard
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
