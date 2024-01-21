<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Products;
use App\Models\CartModel;
use App\Models\Banner;
use Config\Services;
use Google\Client; // Use the correct namespace




class Home extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        // Load the userModel in the constructor
        $this->userModel = new \App\Models\UserModel(); // Adjust the namespace and model name accordingly
    }
    


    public function home()
    {
        $products = new Products();
        $data['products'] = $products->findAll();
        return view('home',$data);
    }



    public function store()
{
    $banner = new Banner();
    $file1 = $this->request->getFile('offer_banner');

    if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
        $imageName = $file1->getRandomName();
        $file1->move('./public/Assets/banner', $imageName);

        $data = [
            'offer_banner' => $imageName,
        ];

        $banner->save($data);
        return redirect()->to('admin_dashboard')->with('status', 'Product Data and Image Upload');
    } 
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
    if ($this->request->getMethod() == "get") {
        echo view('register');
    } else if ($this->request->getMethod() == "post") {

        if ($this->validate([
            "username" => "required",
            "email" => "required|valid_email",
            "password" => "required|min_length[5]",
            "cpassword" => "matches[password]"
        ])) {
            //submit the Form
            $username = $this->request->getVar("username");
            $email = $this->request->getVar("email");
            $password = $this->request->getVar("password");

            //now save the data in the database

            $data = [
                "username" => $username,
                "email" => $email,
                "password" => $password
            ];

            $model = new UserModel();
            if (!$model->insert($data)) {
                $error = $model->errors();  // Get the database errors
                log_message('error', 'Database error: ' . print_r($error, true));
                return view('error_view'); // You might want to create an error view
            }

            return view('login');
        } else {
            return redirect()->back()->withInput();
        }
    }
}

    

  
    public function login()
    {
        $data = [];
        $session = Services::session();
        $google_client = new Client(); // Use the correct namespace
        
        $google_client->setClientId('27690592295-i2775bdsde8cusquqmel2gig3fv7lj8v.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('http://localhost/cake_shop/login');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if ($this->request->getVar('code')) {
            $token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        
            if (!isset($token['error'])) {
                $google_client->setAccessToken($token['access_token']);
                $session->set('access_token', $token['access_token']);
        
                $google_service = new \Google\Service\Oauth2($google_client); // Use the correct namespace
                $userData = $google_service->userinfo->get();
        
                // Convert the user data to an array
                $googleUserData = json_decode(json_encode($userData), true);
        
                
               
        
                if ($this->userModel->google_user_exists($googleUserData['id'])) {
                    $updateData = [
                        'oauth_id' =>$googleUserData['id'],
                        'username' => $googleUserData['givenName'],
                        'email' => $googleUserData['email'],
                        'user_type' => 'google',
                        
                    ];
                    $this->userModel->updateGoogleUser($updateData, $googleUserData['id']);
                    $model = new UserModel();
                    $record = $model->where("email", $googleUserData['email'])
                        ->first();
                    
                    // session()->set('access_token', $token['access_token']);
                    $sess_data = [
                        "id" => $record["id"],
                        "username" => $record["username"],
                        "email" => $record["email"],
                        "user_type" => $record["user_type"],
                        "loginned"=>"loginned"
                        
                    ];
                    // session()->set("loginned", $sess_data);
                    $session->set($sess_data);
                    return redirect()->to(base_url());

                } else {
                    $newUserData = [
                        'oauth_id' =>$googleUserData['id'],
                        'username' => $googleUserData['givenName'],
                        'email' => $googleUserData['email'],
                        'user_type' => 'google',
                       
                    ];
                    $this->userModel->createGoogleUser($newUserData);

                    $model = new UserModel();
                    $record = $model->where("email", $googleUserData['email'])
                        ->first();
                    

                    $sess_data = [
                        "id" => $record["id"],
                        "username" => $record["username"],
                        "email" => $record["email"],
                        "user_type" => $record["user_type"],
                        "loginned"=>"loginned"
                        
                    ];
                    $session->set($sess_data);
                    
                    return redirect()->to(base_url());
                }
            }
        }
        
    
if ($this->request->getMethod() == "post") {
    // Validate

   
    if ($this->validate([
        "email" => "required|valid_email",
        "password" => "required",
    ])) {
        $model = new UserModel();
        $record = $model->where("email", $this->request->getVar("email"))
            ->where("password", $this->request->getVar("password"))
            ->first();

        $session = session();
        
        print_r($record);
        if (!is_null($record)) {
            // Data found in the database
            $sess_data = [
                "id" => $record["id"],
                "username" => $record["username"],
                "email" => $record["email"],
                "user_type" => $record["user_type"],
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
            return redirect()->back()->withInput();
        } else {
            $session->set("failed_message", "Record does not match, try again");
            $session->markAsFlashdata('failed_message');
            return redirect()->back()->withInput();
        }
    } else {
       
        return redirect()->back()->withInput();
    }
}


    
        if (!$session->get('access_token')) {
            $data['loginButton'] = $google_client->createAuthUrl();
        }
    
        return view('login', $data);
    }
    
    
    


    public function logout(){
        $session=session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());
    }

}
