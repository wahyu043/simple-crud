<?php

class DashboardController extends Controller
{
    private $dataBarangModel;

    public function __construct()
    {
        $this->dataBarangModel = $this->model('DataBarang');
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $data = [
            'username' => $_SESSION['user'],
            'barang'   => $this->dataBarangModel->getAll()
        ];

        $this->view('dashboard/index', $data);
    }
}
