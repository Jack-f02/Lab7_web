<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Sidebar extends \CodeIgniter\Controller
{
    public function widget()
    {
        $artikelModel = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'artikel_terkini' => $artikelModel->orderBy('id', 'DESC')->limit(5)->find(),
            'kategori'        => $kategoriModel->findAll()
        ];

        return view('template/sidebar_widget', $data);
    }

}
