<?= $this->extend('private_layout')?>
<?= $this->section('content')?>



<?= $this->include("dashboard/sidebar")?>
<div class="container section" style="margin-top: 100px;">
    <div class="row">
        <div class="col dasbord_subbox">
            <div class="right_box">

                <div class="card shadow" style="flex-direction:row;">
                    <div class="card-body p-5">


                        <form action="<?=base_url('product/update/'.$product['id']) ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingLastnameInput"
                                            placeholder="Enter Your Last Name" name="prod_id"
                                            value="<?= $product['prod_id'] ?>">

                                        <label for="floatingLastnameInput" for="prod_id">Product ID</label>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingLastnameInput"
                                            placeholder="Enter Your Last Name" name="prod_name"
                                            value="<?= $product['prod_name'] ?>">
                                        <label for="floatingLastnameInput" for="prod_name">Product Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelectGrid"
                                            aria-label="Floating label select example" name="prod_cat"
                                            value="<?= $product['prod_cat'] ?>">
                                            <option selected name="prod_cat">Category</option>
                                            <option value="Cake">Cake</option>
                                            <option value="Chocolate">Chocolate</option>
                                        </select>
                                        <label for="prod_cat">Select The Category</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingLastnameInput"
                                            placeholder="Enter Your Last Name" name="prod_price"
                                            value="<?= $product['prod_price'] ?>">
                                        <label for="floatingLastnameInput" for="prod_price">Product Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5  w-50">
                                <label for="prod_image" class="form-label">Product image</label>
                                <input class="form-control" type="file" id="formFile" name="prod_image">
                            </div>
                            <div class="mb-2 text-center" >
                                <input type="submit" name="add_product" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                                
                    </div>
                    <div class="col-md-3 p-3">
                        <img src="<?=base_url('./public/uploads/'.$product['prod_image'])?>" class="w-100"
                            alt="product image">
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>