<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ShippingModel;

class AdminController extends BaseController
{
    public function admin_dashboard()
    {
        $model= new ShippingModel();
        $shipping= $model->findAll();
        echo view('dashboard/admin_dashboard',['shipping'=>$shipping]);
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