<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table      = 'ventas';
    protected $primaryKey = 'id';

    /*  protected $useAutoIncrement = true; */

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio', 'total', 'id_usuario', 'id_caja', 'id_mesa', 'forma_pago', 'activo'];

    /* protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;*/

    // Dates
    protected $useTimestamps = true;
    /* protected $dateFormat    = 'datetime';*/
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    public function insertaVenta($id_venta, $total, $id_usuario, $id_caja, $id_mesa, $forma_pago)
    {
        $this->insert([
            'folio' => $id_venta,
            'total' => $total,
            'id_usuario' => $id_usuario,
            'id_caja' => $id_caja,
            'id_mesa' => $id_mesa,
            'forma_pago' => $forma_pago

        ]);

        return $this->insertID();
    }

    public function obtener($activo = 1){
        $this->select('ventas.*, u.usuario AS mesero, m.nombre AS mesa');
        $this->join('usuarios AS u', 'ventas.id_usuario = u.id');
        $this->join('mesas AS m', 'ventas.id_mesa = m.id');
        $this->where('ventas.activo', $activo);
        $this->orderBy('ventas.fecha_alta', 'DESC');
        $datos = $this->findAll();
        //print_r($this->getLastQuery());
        return $datos;
    }

    public function totalDia($fecha){
        $this->select("sum(total) AS total");
        $where = "activo = 1 AND DATE(fecha_alta) = '$fecha'";
        return $this->where($where)->first();
    }
}
