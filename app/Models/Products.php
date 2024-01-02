<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['prod_id','prod_name','prod_cat','prod_image','prod_price'];
}
