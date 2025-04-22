<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\VentasModel;


class Inicio extends BaseController
{
    protected $productosModel, $ventasModel, $session;

    public function __construct(){   
        $this->productosModel = new ProductosModel();
        $this->ventasModel = new VentasModel();
        $this->session = session();
    }

    public function index(){

        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $total = $this->productosModel->totalProductos();
        $minimos = $this->productosModel->productosMinimo();
        $hoy = date('Y-m-d');
        $totalVentas = $this->ventasModel->totalDia($hoy);
        $datos = ['total' => $total, 'totalVentas' => $totalVentas, 'minimos' => $minimos];

        echo view('header');
        echo view('inicio', $datos);
        echo view('footer');
    }
}
