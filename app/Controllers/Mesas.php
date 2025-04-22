<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MesasModel;

class Mesas extends BaseController
{

    protected $mesas;
    protected $reglas, $session;

    public function __construct()
    {
        $this->mesas = new MesasModel();
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

        $mesas = $this->mesas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Mesas', 'datos' => $mesas];

        echo view('header');
        echo view('mesas/mesas', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $mesas = $this->mesas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Mesas eliminadas', 'datos' => $mesas];

        echo view('header');
        echo view('mesas/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $data = ['titulo' => 'Agregar mesa'];

        echo view('header');
        echo view('mesas/nuevo', $data);
        echo view('footer');
    }


    public function insertar()
    {

        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->mesas->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'mesas');
        } else {

            $data = ['titulo' => 'Agregar mesa', 'validation' => $this->validator];

            echo view('header');
            echo view('mesas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $mesa = $this->mesas->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar mesa', 'datos' => $mesa, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar mesa', 'datos' => $mesa];
        }

        echo view('header');
        echo view('mesas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->mesas->update($this->request->getPost('id'), ['nombre' =>
            $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'mesas');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {

        $this->mesas->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'mesas');
    }

    public function reingresar($id)
    {

        $this->mesas->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'mesas');
    }

    public function autocompleteData(){

        $returnData = array();

        $valor = $this->request->getGet('term');

        $mesas = $this->mesas->like('nombre', $valor)->where('activo', 1)->findAll();
        if(!empty($mesas)){
            foreach($mesas as $row){
                $data['id'] = $row['id'];
                $data['value'] = $row['nombre'];
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }
}
