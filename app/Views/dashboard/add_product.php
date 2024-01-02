<?= $this->extend('private_layout')?>
<?= $this->section('content')?>



<section class="dasbord_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col dasbord_subbox">
                <?= $this->include("dashboard/sidebar")?>
                <div class="right_box">
                   
                <div class="card shadow">
                <div class="card-body p-5">
                  
                
<form action="<?=base_url('product-store')?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingLastnameInput"
                                        placeholder="Enter Your Last Name" name="prod_id">
                                    <label for="floatingLastnameInput" for="prod_id">Product ID</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingLastnameInput"
                                        placeholder="Enter Your Last Name" name="prod_name">
                                    <label for="floatingLastnameInput" for="prod_name">Product Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelectGrid"
                                        aria-label="Floating label select example" name="prod_cat">
                                        <option selected name="prod_cat">Category</option>
                                        <option value="Cake">Cake</option>
                                        <option value="Chocolate">Chocolate</option>
                                    </select>
                                    <label for="category">Select The Category</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingLastnameInput"
                                        placeholder="Enter Your Last Name" name="prod_price">
                                    <label for="floatingLastnameInput" for="prod_price">Product Price</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3  w-25">
                            <label for="prod_image" class="form-label">Product image</label>
                            <input class="form-control" type="file" id="formFile" name="prod_image">
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" name="add_product" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                   
                </div>
            </div>

                </div>
            </div>
        </div>
    </div>
   
</section>
<?= $this->endSection() ?>

