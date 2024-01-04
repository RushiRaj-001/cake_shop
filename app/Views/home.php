<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>


<!-- <div class="container-fluid m-0 p-0" >  -->

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators $carousel-indicator-transition">
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner img-fluid">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="<?= base_url()?>public/Assets/banner.jpg" class="d-block w-100 h-auto" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?= base_url()?>public/Assets/banner2.jpg" class="d-block w-100 h-auto" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?= base_url()?>public/Assets/banner3.jpg" class="d-block w-100 h-auto" alt="...">
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- </div> -->

<!-- product cards -->

<div class="hero-section mt-5">
    <h1>Indulge in the Sweet Artistry of Our Cakes</h1>
    <p>Discover a world of delightful flavors crafted just for you.</p>

    <button class="btn2 mt-4"><a class="text-decoration-none" style="color:#fff;" href="<?= base_url()?>shop">Shop
            Now</a></button>
</div>




<div class="container-fluid my-5">
    <h1 class="text-center fw-bold mb-5 display-6">Our<span class="text-danger"> Special</span></h1>
    <div class="row">
        <div class="owl-carousel owl-theme owl-loaded owl-drag">












            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2376px;">
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/cake.jpg" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/cake.jpg" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/cake.jpg" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/cake.jpg" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/bg choco.jpg" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/o1.png" alt="" class="card-img-top">
                        </div>
                    </div>
                    <div class="owl-item active" style="width: 178px; margin-right: 20px;">
                        <div class="item">
                            <img src="<?= base_url()?>public/Assets/o5.png" alt="" class="card-img-top">
                        </div>
                    </div>
                   
                </div>
            </div>
          
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
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