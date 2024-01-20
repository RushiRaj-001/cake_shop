<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','oauth_id','username','email', 'password'];

    function google_user_exists($id){
        $builder = $this->db->table('users');
        $builder->where('oauth_id',$id);

        if($builder->countAllResults()==1){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateGoogleUser($data,$id){
        $builder = $this->db->table('users');
        $builder->where('oauth_id',$id);
        $builder->update($data);
        if($this->db->affectedRows()==1){
            return true;
        }
        else{
            return false;
        }
    }

    public function createGoogleUser($data){
        $builder = $this->db->table('users');
        $res = $builder->insert($data);
        if($this->db->affectedRows()==1){
            return true;
        }
        else{
            return false;
        }
    }
}

 