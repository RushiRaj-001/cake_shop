<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="grid1" >
    <?php foreach($products as $item) : ?>
        <div class="card1 mt-4 mx-auto" data-aos="fade-up"
      data-aos-duration="1500">
            <div class="card-img">
                <img src="<?=base_url()?>/public/uploads/<?=$item['prod_image']?>" alt="">
            </div>
            <div class="name"><?= $item['prod_name']?></div>
            <div class="price"><?= $item['prod_price']?>₹</div>

            <div class="card-footer pt-3 border-top-0 bg-transparent">
    <div class="text-center">
        <?php $session = session(); ?>
        <?php if ($session->loginned): ?>
            <!-- User is logged in, display the Add to cart button -->
            <a class="btn2 btn-outline-dark mt-auto addToCartbtn" href="javascript:void(0)"
                onclick="addToCart(<?= $item['prod_id'] ?>, <?= $item['prod_price'] ?>, <?= $session->id ?>)">
                Add to cart
            </a>
        <?php else: ?>
            <!-- User is not logged in, provide a link to the login page -->
            <a class="btn2 btn-outline-dark mt-auto" style="text-decoration: none;" href="<?= base_url() ?>login">
                Add to cart
            </a>
        <?php endif ?>
    </div>
</div>
        </div>
        <?php endforeach ?>
</div>
</div>

</section>

<?= $this->include("footer") ?>
<?= $this->endSection() ?>