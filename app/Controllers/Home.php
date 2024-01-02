<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Products;
use App\Models\CartModel;

class Home extends BaseController
{
    public function home()
    {
        $products = new Products();
        $data['products'] = $products->findAll();
        return view('home',$data);
    }

    public function shop()
    {
        $products = new Products();
        $data['products'] = $products->findAll();
        return view('shop',$data);
    }


    public function __constructor(){
        helper(['url', 'form']);
    }

    public function register()
    {
        
        if($this->request->getMethod() =="get"){
            echo view('register');

        }
        else if($this->request->getMethod() =="post"){
            
            if($this->validate([ 
            "username"=>"required",
            "email"=>"required|valid_email",
            "password"=>"required|min_length[5]",
            "cpassword"=>"matches[password]"
            ])){
                //submit the Form
                $username=$this->request->getVar("username");
                $email=$this->request->getVar("email");
                $password=$this->request->getVar("password");

                //now save the data at the database

                $data=[
                    "username"=>$username,
                    "email"=>$email,
                    "password"=>$password
                ];

                $model=new UserModel();
                $model->insert($data);

                return view('login');
            }
            else{
                return redirect()->back()->withInput();
            }
        }
    
    }
    public function login()
    {
        if ($this->request->getMethod()=="get") {
            
            echo view('login');
        }
        else if ($this->request->getMethod()=="post"){
            //validate
            if($this->validate([
                "email"=>"required|valid_email",
                "password"=>"required",
            ])){
                $model = new UserModel();
                $record=$model->where("email",$this->request->getVar("email"))
                ->where("password",$this->request->getVar("password"))
                ->first();

                var_dump($record);
                $session=session();
                if(! is_null($record)){
                    //data found at database
                    $sess_data=[
                        "id" => $record["id"],
                        "username"=>$record["username"],
                        "email"=>$record["email"],
                        "user_type"=>$record["user_type"],
                        "loginned"=>"loginned"
                    ];
                    $session->set($sess_data);
                    if($record['user_type']=="user"){
                        //go to user page
                        $url="";
                    }
                    else if($record['user_type']=="admin"){
                        // go to admin page
                        $url="admin_dashboard";
                    }

                    return redirect()->to(base_url($url));
                }
                else{
                    $session=session();
                    $session->set("failed_message","Record does not Match, try again");
                    $session->markAsFlashdata('failed_message');
                    return redirect()->back()->withInput();
                }
            }
            else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function logout(){
        $session=session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());
    }

}
