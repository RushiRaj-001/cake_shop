<?php

use App\Models\CartModel;

$cartModel = new CartModel();
$session = session();
$allcount = 0;

if ($session->loginned) {
    $user_id = $session->id;
    $allcount = $cartModel->where('user_id', $user_id)->countAllResults();
}

?>


<nav class="navbar navbar-expand-lg mx-auto " id="navbar">
    <!-- Brand -->
    <a class="navbar-brand" href="#" id="logo"><img src="<?=base_url()?>public/Assets/logo.png" alt=""
            width="50px">Nutty Bake</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" id="menu" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span><img src="public/Assets/icons/menu.png" alt="" width="30px"></span>
    </button>

    <!-- Navbar links -->
    <div class="fs-5 navbar p-0" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('./')?>">Home</a>
            </li>

            <li class="nav-item  ">
                <a class="nav-link" href="<?= base_url()?>shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url()?>#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url()?>#contact">Contact</a>
            </li>
        </ul>

        <div class="icons">
            <div class="box">
                <input type="search" name="search" id="">
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            
            <button type="submit" class=" btn-primary position-relative mx-2 border-0 p-0" style="background-color:transparent ; color:#1d1d1f; border-color:#d24b4b;" fdprocessedid="217tz7">
        <span class="fa-layers fa-fw" style="background:transperent; ">
        <a href="<?= base_url()?>cart"><i class="fa-solid fa-cart-shopping"></i></a>

        <span class="fa-layers-counter position-absolute top-0 start-100 translate-middle badge bg-danger" id="cartcount"><?= $allcount?></span>
        </span>

</button>

<?php $session = session(); ?>
<div>
    <?php if ($session->loginned): ?>
        <?php if (isset($session->loginned['oauth_id']) && $session->loginned['oauth_id']): ?>
            <!-- Display Google username when logged in with Google -->
            <span style="color:#c69328; margin-left:10px;"><?= ucfirst($session->loginned['username'] ?? '') ?></span>
        <?php else: ?>
            <!-- Display regular user username when logged in -->
            <span style="color:#c69328; margin-left:10px;"> <?=ucfirst( $session->  username)?></span>
        <?php endif ?>
        <a style="color:#c69328; text-decoration:none; margin-left:10px;" href="<?= base_url('logout') ?>">Logout</a>
    <?php else: ?>
        <a style="color:#c69328; text-decoration:none; margin-left:10px;" href="<?= base_url('login') ?>">
            <i class="fa-solid fa-user"></i> Login</a>
    <?php endif ?>
</div>



</div>


</nav>

</div>


<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
    var navItems = document.querySelectorAll(".nav-item");

    navItems.forEach(item => {
        item.addEventListener("click", function () {
            // Remove "active" class from all nav items
            navItems.forEach(nav => nav.classList.remove("active"));

            // Add "active" class to the clicked nav item
            item.classList.add("active");
        });
    });
});
</script> -->