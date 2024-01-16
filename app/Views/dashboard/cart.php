<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>


<div class="container-fluid mt-3 px-5">
    <div class="text-center fs-2">Cart Details</div>
    <?php
    $totalItemPrice = 0;
    foreach ($cartItems as $key => $item) {
        $totalItemPrice += $item['prod_price'] * $item['CartQty'];
     ?>
       
        <div id="productRow_<?= $item['prod_id'] ?>" class="container-fluid text-dark my-3 px-3 py-3  shadow text-black text-center" style="width:80%; border-radius: 15px; padding-left:5x; padding-right:15px; background: aliceblue;">


            <div class="card-body py-1 ">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-1 ol-lg-2 col-xl-2">

                        <img height="50" width="100" src="<?= base_url() ?>/public/uploads/<?= $item['prod_image'] ?>" class="img-fluid rounded-3 mb-2" alt="Cake">
                    </div>
                    <div class="col-md-1 col-lg-2 col-xl-2 mx-auto">
                        <h6 class="text-center"> Product Name</h6>
                        <p class="lead fw-normal mb-2 notranslate" translate="no">
                            <?= $item['prod_name'] ?>
                        </p>
                    </div>
                    <div class="col-md-1 col-lg-2 col-xl-2 offset-lg-1 mx-auto">
                        <h6 class="text-center"> Quantity</h6>

                        <div class="d-flex align-items-center">

                            <div id="stepdown" class="btn btn-link mx-1  " fdprocessedid="900hwa">
                                <a href="javascript:void(0)" onclick="decrement(<?= $item['prod_id'] ?>,<?= $item['user_id'] ?>)">
                                    <i class="fas fa-minus " style="color: #818181;"></i>
                                </a>
                            </div>
                            <form id="forminput_<?= $item['prod_id'] ?>">
                                <input min="1" id="totaladdCount<?= $item['prod_id'] ?>" name="quantity" value="<?= $item['CartQty'] ?>" type="number" class=" text-center " fdprocessedid="i36tzq" style="width:4rem;">
                            </form>

                            <div class="btn btn-link mx-1 " fdprocessedid="9uqoaf">
                                <a href="javascript:void(0)" onclick="addToCart(<?= $item['prod_id'] ?>,<?= $item['prod_price'] ?>,<?= $item['user_id'] ?>)">
                                    <i class="fas fa-plus " style="color: #818181;"></i>
                                </a>
                            </div>

                            <div class="py-2">


                                <button type="submit" id="remove" class="text-danger form-contorl text-center" onclick="removeItem(<?= $item['cartID'] ?>,<?= $item['prod_id'] ?>)" style="background-color: Transparent;background-repeat:no-repeat;border: none; cursor:pointer; overflow: hidden; outline:none;" fdprocessedid="ywh397"><i class="fa-solid fa-trash"></i></button>

                            </div>
                        </div>


                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class=" text-center">Price</h6>
                        <h5 style="font-family:Arial, Helvetica, sans-serif"><b>
                                <?= $item['prod_price'] ?> ₹
                            </b>&nbsp;<span style="text-decoration: line-through; color:#818181; "></span>&nbsp;<span style="color:green;"></span></h5>
                        
                      
                    </div>

                </div>
            </div>

        </div>

    <?php } ?>

</div>

<div class="px-5 py-1 border-1 text-dark  shadow text-black  " style="float:right; background-color:#ffff ; border-radius : 20px; overflow: hidden; outline:none;">

    <h3 class="text-center text-muted">Price Details</h3>
    <hr>
    <h5 class=" ">Price : <span id="payamount"> <?php echo $totalItemPrice ?></span> ₹</span></h5>


    <h5 class="">Plan Discount<span style="float: right; color:green">
            0%</span></h5>
    <h5 class=" ">Delivery Charges<span style="float: right;"> 40₹ </span></h5>
    <?php  $final_price = $totalItemPrice + 40; ?>
    <h4 class=" ">Total Amount : <span style="float: right;"><span id="finalPrice"> <?php echo $final_price ?></span> ₹</span></h4>

    <?php $session = session(); ?>
    <a
    href="<?= base_url('checkout')?>"
    
    class="btn btn-success btn-block btn-lg text-center my-2 mb-5 text-wrap">Proceed to Buy </a>

</div>



<?= $this->endSection() ?>