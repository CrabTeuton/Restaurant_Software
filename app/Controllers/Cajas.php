<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\ArqueoCajaModel;

class Cajas extends BaseController
{

    protected $cajas, $arqueoModel;
    protected $reglas, $session;

    public function __construct()
    {
        $this->cajas = new CajasModel();
        $this->arqueoModel = new ArqueoCajaModel();

        $this->session = session();
        helper(['form']);

        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Cajas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $cajas = $this->cajas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Cajas eliminados', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $data = ['titulo' => 'Agregar Rol'];

        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->cajas->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'cajas');
        } else {

            $data = ['titulo' => 'Agregar caja', 'validation' => $this->validator];

            echo view('header');
            echo view('cajas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }
        
        $caja = $this->cajas->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar caja', 'datos' => $caja, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar caja', 'datos' => $caja];
        }


        echo view('header');
        echo view('cajas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->cajas->update($this->request->getPost('id'), ['nombre' =>
            $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'cajas');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {

        $this->cajas->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'cajas');
    }

    public function reingresar($id)
    {

        $this->cajas->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'cajas');
    }

    public function arqueo($idCaja){
        $arqueos = $this->arqueoModel->getDatos($idCaja);
        $data = ['titulo' => 'Cierres de caja', 'datos' => $arqueos];

        echo view('header');
        echo view('cajas/arqueos', $data);
        echo view('footer');
    }
}
