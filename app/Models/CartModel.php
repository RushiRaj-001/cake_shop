<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table      = 'cart';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id','prod_id','user_id','qty','prod_price','created_at','updated_at'];
}
