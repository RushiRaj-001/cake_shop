<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Products;
use App\Models\CartModel;

class ProductController extends BaseController
{
    
        public function product()
        {
            $products = new Products();
            $data['products'] = $products->findAll();

            $products->select('products.prod_id,products.prod_image,products.prod_price, cart.prod_price, cart.qty as CartQty, cart.prod_price as CartPrice');
            $products->where('products.id','$id');
            $products->join('cart','cart.prod_id= products.prod_id','left');
            $product= $products->first();
    
            return view('dashboard/product',$data);
        }
        public function store()
        {
            $product = new Products();
          $file = $this->request->getFile('prod_image');    
            if ($file->isValid() && ! $file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('./public/uploads',$imageName);    
            }
    
            $data = [
                    'prod_id' => $this->request->getPost('prod_id'),
                    'prod_name' => $this->request->getPost('prod_name'),
                    'prod_cat' => $this->request->getPost('prod_cat'),
                    'prod_image' => $imageName,
                    'prod_price' => $this->request->getPost('prod_price')
            ];
    
            $product->save($data);
            return redirect()->to('product')->with('status','Product Data and Image Upload');
        }
    
        
    public function edit($id){
        $products = new Products();
        $data['product'] = $products->find($id);
        return view('dashboard/edit',$data);
    }

    
    public function update($id){
        $products = new Products();
        $prod_item = $products->find($id);

        // echo $prod_item['image'];
        $file = $this->request->getFile('prod_image');
        $old_img_name = $prod_item['prod_image'];

        if($file->isValid() && !$file->hasMoved()){
            
            if(file_exists("./public/uploads/".$old_img_name)){
                unlink("./public/uploads/".$old_img_name);
            }
            $imageName = $file->getRandomName();
            $file->move('./public/uploads',$imageName);
        }
        else{
            $imageName = $old_img_name;
        }
        $data = [
            'prod_id' => $this->request->getPost('prod_id'),
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_cat' => $this->request->getPost('prod_cat'),
            'prod_image' => $imageName,
            'prod_price' => $this->request->getPost('prod_price')
    ];

    $products->update($id,$data);
    return redirect()->to('product')->with('status','Product Data and Image Upload');
        
    }

    public function delete($id){
        $product = new Products();
    
        $data = $product->find($id);
        $imagefile = $data['prod_image'];
        if(file_exists("./public/uploads/".$imagefile))
        {
            unlink("./public/uploads/".$imagefile);
        }
        $product->delete($id);
        return redirect('product')->back()->with('status','Product data and Image Deleted');
    }

     
    public function addToCart(){

        // $products = new Products();
        $CartModel = new CartModel();
        
        if ($this->request->getMethod() == 'post'){
            $returnarr = array();
            
            $prod_id = $this->request->getVar('prod_id');
            $user_id = $this->request->getVar('user_id');

            $data = array(
                'prod_id'=> $this->request->getVar('prod_id'),
                'qty'=>1,
                'prod_price'=> $this->request->getVar('prod_price'),
                'user_id'=> $this->request->getVar('user_id'),
            );
            
            $product = $CartModel->where('prod_id',$prod_id)->where('user_id',$user_id)->findAll();
            $allcount = $CartModel->where('user_id',$user_id)->countAll();
            


            if(count($product)==1)
            {
                $oldQyt= $product[0]['qty'];
                $Id= $product[0]['id'];

                $updateddata = array(
                    
                    'qty'=> $oldQyt+1,
                );

                if($CartModel->update($Id, $updateddata))
                {
                    $returnarr=array('status'=>'success','Qyt'=> $oldQyt + 1,'count' => $allcount);
                }
                else{
                    echo 9;
                }

            }else{
                if($CartModel->save($data))
                {   
                    // echo 1;
                    // print_r($allcount);
                    $returnarr=array('status'=>'success','Qyt'=> 1, 'count' => $allcount+1);
                }
                else{
                    echo 2;
                }
            }
                    echo json_encode($returnarr);  
          
        }
    }

    public function cart(){

        $useSessiondata = session()->get();
        $data=[];

        $products = new Products(); 
        $CartModel = new CartModel();

        $products->select('products.prod_id, products.prod_name,products.prod_image,products.prod_price, cart.id as cartID, cart.prod_price, cart.qty as CartQty, cart.user_id , cart.prod_price as CartPrice');
        $products->where('cart.user_id',$useSessiondata['id']);
        $products->join('cart','cart.prod_id= products.prod_id');
        $data['cartItems'] = $products->findAll();


        // $data['cartItems'] = $CartModel->where('user_id', $useSessiondata['id'])->findAll();
        
        $data['products'] = $products->findAll();
        $data['main_content'] = 'cart';
        return view('dashboard/cart',$data);
    }

    public function  decrement(){
        $CartModel = new CartModel();     
        if ($this->request->getMethod() == 'post'){
            $returnarr = array();    
            $prod_id = $this->request->getVar('prod_id');
            $user_id = $this->request->getVar('user_id');
            
            $product = $CartModel->where('prod_id',$prod_id)->where('user_id',$user_id)->findAll();
            $oldQyt= $product[0]['qty'];
            $Id= $product[0]['id'];

            if($oldQyt==1)
            {
            }
            else{
                    $updateddata = array(
                        'qty' => $oldQyt -1,

                    );
              if($CartModel->update($Id, $updateddata))
                {   
                    $returnarr=array('status'=>'success','Qyt'=> $oldQyt -1);
                }
                else{
                }
            }
                    echo json_encode($returnarr);  
          
        }
    }

    public function removeItem(){
        $CartModel = new CartModel();

        if ($this->request->getMethod() == 'post'){
            $returnarr = array();    
            
            $cartID = $this->request->getVar('cartID');
            if($CartModel->where('Id', $cartID)->delete())
            {
                $returnarr = array('status' => 'success');
            }
            else{

            }
                    echo json_encode($returnarr);  
          
        }
    }
}