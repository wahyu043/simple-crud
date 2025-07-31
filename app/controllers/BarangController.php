<?php

class BarangController extends Controller
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = $this->model('Barang');
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->getAll();
        $this->view('barang/index', $data);
    }

    public function create()
    {
        $this->view('barang/create');
    }

    public function store()
    {
        $this->barangModel->insert([
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang']
        ]);
        header('Location: ' . BASE_URL . '/barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->barangModel->getById($id);
        $this->view('barang/edit', $data);
    }

    public function update($id)
    {
        $this->barangModel->update($id, [
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang']
        ]);
        header('Location: ' . BASE_URL . '/barang');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        header('Location: ' . BASE_URL . '/barang');
    }
}
