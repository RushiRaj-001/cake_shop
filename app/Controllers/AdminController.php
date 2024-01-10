<?php

namespace App\Controllers;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function admin_dashboard()
    {
        $model= new UserModel();
        $users= $model->findAll();
        echo view('dashboard/admin_dashboard',['users'=>$users]);
    }

    public function customer()
    {
        $model= new UserModel();
        $users= $model->findAll();
        echo view('dashboard/customer',['users'=>$users]);
    }

    public function category(){
        echo view('category');
    }

    public function add_product(){
        echo view('dashboard/add_product');
    }

   

}