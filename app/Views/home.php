<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>


<div class="container-fluid m-0 p-0" >
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url()?>public/Assets/banner.jpg" class="d-block w-100 img-fluid" alt="Banner">
      <div class="carousel-caption d-none d-md-block">
        <h5>Nutty Bakes</h5>
       <button class="btn">Order Now</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url()?>public/Assets/banner2.jpg" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h5 style="color:#2a2524">Nutty Bakes</h5>
       <button class="btn">Order Now</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url()?>public/Assets/banner3.jpg" class="d-block w-100 img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h5>Nutty Bakes</h5>
       <button class="btn">Order Now</button>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>


<!-- product cards -->
<section id="shop" class="py-5">
    <h2 class="text-center" style="font-size: 5rem; color:#76453B; ">Cakes</h2>
    <div class=" px-4 mt-5 mx-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 column-gap-4 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach($products as $item) : ?>
            <div class="col mb-5 ">
                <div class="box row h-100 prod-card">
                    <!-- Product image-->
                    <div class="img-size"><img class="card-img-top" src="<?=base_url()?>/public/uploads/<?=$item['prod_image']?>" alt="cake_1" /></div>
                    
                    <!-- Product details-->
                    <div class="card-body p-2">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">
                                <?= $item['prod_name']?>
                            </h5>
                            <!-- Product price-->
                            <h5 class="mt-2">Price :
                                <?= $item['prod_price']?>₹
                            </h5>
                        </div>
                    </div>
                    <div class="mx-auto input_div" style="width:140px; display:none;">
                    <div  class=" d-flex justify-content-center align-items-center" style=" height: 40px; gap: 5px;" >
                        <input class="border" type="button" value="+" style="width:35px; height:35px;" onclick="plus()">
                        <input class="border" type="text" size="25" value="1" style="width:35px; height:35px;">
                        <input class="border" type="button" value="-"  style="width:35px; height:35px;" onclick="minus()">
                    </div>
                        
            </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                        <?php $session=session(); ?>
                            <?php if($session->loginned=="loginned") { ?>
                            <a class="btn btn-outline-dark mt-auto addToCartbtn" href="javascript:void(0)"
                                onclick="addToCart(<?= $item['prod_id']?>,<?= $item['prod_price']?>,
                                <?= $session->id?>)">Add to cart</a>
                            <?php } else { ?>
                            <a  class="btn btn-outline-dark mt-auto "  href="<?= base_url()?>login">Add to cart</a>
                            <?php } ?>
                    </div>
                    </div>
                </div>
            </div>

            <?php endforeach ?>

        </div>
    </div>

    
</section>



<?= $this->endsection() ?>