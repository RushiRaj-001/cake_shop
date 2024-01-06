<?php

namespace App\Models;

use CodeIgniter\Model;

class Banner extends Model
{
    protected $table      = 'banner';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['offer_banner'];
}
