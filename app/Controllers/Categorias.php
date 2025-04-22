<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{

    protected $categorias;
    protected $reglas, $session;

    public function __construct()
    {
        $this->categorias = new CategoriasModel();
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

        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Categorias', 'datos' => $categorias];

        echo view('header');
        echo view('categorias/categorias', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Categorias eliminadas', 'datos' => $categorias];

        echo view('header');
        echo view('categorias/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }

        $data = ['titulo' => 'Agregar categoria'];

        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');
    }


    public function insertar()
    {

        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->categorias->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'categorias');
        } else {

            $data = ['titulo' => 'Agregar categoria', 'validation' => $this->validator];

            echo view('header');
            echo view('categorias/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        if(!isset($this->session->id_usuario)){ 
            return redirect()->to(base_url());
        }
        
        $categoria = $this->categorias->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar categoria', 'datos' => $categoria, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar categoria', 'datos' => $categoria];
        }

        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "POST" && $this->validate($this->reglas)) {
            $this->categorias->update($this->request->getPost('id'), ['nombre' =>
            $this->request->getPost('nombre')]);
            return redirect()->to(base_url() . 'categorias');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {

        $this->categorias->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . 'categorias');
    }

    public function reingresar($id)
    {

        $this->categorias->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . 'categorias');
    }
}
