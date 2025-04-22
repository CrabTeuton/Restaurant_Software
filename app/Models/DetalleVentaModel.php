<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model
{
    protected $table      = 'detalle_venta';
    protected $primaryKey = 'id';

    /*  protected $useAutoIncrement = true; */

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_venta', 'id_producto','nombre', 'cantidad', 'precio'];

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

}
