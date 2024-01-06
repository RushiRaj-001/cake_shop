<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0 ">
    <div id="images" class="text-center">
        <img class="mySlides" src="<?= base_url()?>public/Assets/banner.jpg">
        <img class="mySlides" src="<?= base_url()?>public/Assets/banner2.jpg">
        <img class="mySlides" src="<?= base_url()?>public/Assets/banner3.jpg">
    </div>
</div>

<!-- product cards -->

<div class="hero-section mt-5" data-aos="fade-up"
            data-aos-duration="1500">
<h2>Delicious Cake for Everyone </h2>
    <h1>Indulge in the Sweet Artistry of Our Cakes</h1>
    <p>Discover a world of delightful flavors crafted just for you.</p>

    <button class="btn2 mt-4"><a class="text-decoration-none" style="color:#fff;" href="<?= base_url()?>shop">Shop
            Now</a></button>
</div>




<div class="container-fluid my-5">
    <h1 class="text-center fw-bold mb-3 display-6  py-4" style="background:#e6e2e2; ">Our<span class="text-danger"> Special</span></h1>
    <div class="row" data-aos="fade-up"
            data-aos-duration="1500">
        <div class="owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2376px;">
                    <?php foreach($products as $item) : ?>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                    <div class="card1 mt-4 mx-auto">
            <div class="card-img">
                <img src="<?=base_url()?>/public/uploads/<?=$item['prod_image']?>" alt="">
            </div>
            <div class="name"><?= $item['prod_name']?></div>
            <div class="price"><?= $item['prod_price']?>₹</div>

            <div class="card-footer pt-3 border-top-0 bg-transparent">
                        <div class="text-center">
                        <?php $session=session(); ?>
                            <?php if($session->loginned=="loginned") { ?>
                            <a class="btn2 btn-outline-dark mt-auto addToCartbtn"  href="javascript:void(0)"
                                onclick="addToCart(<?= $item['prod_id']?>,<?= $item['prod_price']?>,
                                <?= $session->id?>)">Add to cart</a>
                            <?php } else { ?>
                            <a  class="btn2 btn-outline-dark mt-auto " style="text-decoration: none;"  href="<?= base_url()?>login">Add to cart</a>
                            <?php } ?>
                    </div>
                    </div>
        </div>
                    </div>
                    <?php endforeach ?>
                   
                </div>
            </div>
          
        </div>
    </div>
</div>


<section id="about" class="container-fluid mt-3">
<h2 class="text-center mt-5 fw-bold mb-5 display-6 py-4" style="background:#e6e2e2; ">About Us</h2>
<div class="container" data-aos="fade-up"
      data-aos-duration="1500">
    <div class="row">
      <div class="col-md-6">
        <div class="about-image" >
          <img src="<?= base_url()?>public/Assets/cake.jpg" alt="Natty Bake Interior" class="img-fluid rounded">
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-text">
          
          <p>Welcome to Natty Bake, passion with pastry. Our talented bakers craft each cake to perfection, using only the finest ingredients. Whether it's a birthday, wedding, or a simple craving, we have a cake for every occasion. Join us in making life a little sweeter!</p>
        </div>
      </div>
    </div>
    </div>
  </section>



<section id="contact" class="container-fluid mt-3">
    
    <h2 class="text-center mt-5 fw-bold mb-3 display-6 py-4" style="background:#e6e2e2;">Contact Us</h2>
    <div class="container p-3 " style="background:#e2e1e1" id="contact"    data-aos="fade-up"
          data-aos-duration="1500">
        <div class="row">
            <div class="col-md-4 py-1 py-md-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="usr" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4 py-1 py-md-0">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" placeholder="Email">
                </div>
            </div>
            <div class="col-md-4 py-1 py-md-0">
                <div class="form-group">
                    <input type="number" class="form-control" id="phn" placeholder="Phone">
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" placeholder="Message"></textarea>
        </div>
        <div  id="messagebtn"><button class="btn mx-auto" style="    background: aliceblue;
    border: 2px solid black;">Send Message</button></div>
      </div>
</section>



<?= $this->include("footer") ?>


<script>
  var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].classList.remove("fade-in");
        }

        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].classList.add("fade-in");
        setTimeout(showSlides, 6000); // Change image every 4 seconds (adjust as needed)
    }

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    </script>
   
<?= $this->endsection() ?>