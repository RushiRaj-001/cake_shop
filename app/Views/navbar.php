<?php 

    use App\Models\CartModel;
    $CartModel = new CartModel();
    
    $session=session(); 
    $data = $session->get();
   $allcount=0;
    if(@$data['loginned']) {
        // print_r($data['id']);
    $user_id = $data['id'];
    $allcount = $CartModel->where('user_id', $user_id)->countAllResults();


} 
// $count = count($allcount);
// print_r($allcount);         
?>

<nav class="navbar navbar-expand-lg mx-auto" id="navbar">
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
            <!-- dropdown -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url()?>#shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <div class="icons">
            <div class="box">
                <input type="search" name="search" id="">
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <!-- <div >
           <span class="fa-layers-counter position-absolute top-0 start-100 translate-middle badge bg-danger" id="cartcount">3</span>
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            </div> -->
            <button type="submit" class=" btn-primary position-relative mx-2 border-0 p-0" style="background-color:transparent ; color:#1d1d1f; border-color:#d24b4b;" fdprocessedid="217tz7">
        <span class="fa-layers fa-fw" style="background:transperent; ">
        <a href="<?= base_url()?>cart"><i class="fa-solid fa-cart-shopping"></i></a>
    <span class="fa-layers-counter position-absolute top-0 start-100 translate-middle badge bg-danger" id="cartcount"><?= $allcount?></span>
  </span>

</button>

            <?php $session=session(); ?>
            <?php if($session->loginned=="loginned"): ?>
            <a style="color:#c69328; text-decoration:none; margin-left:10px;" href="<?= base_url()?>logout"> Logout</a>
            <a style="color:#c69328; text-decoration:none; margin-left:10px;" href="<?= base_url()?><?=$session->user_type == "admin" ? "admin_dashboard" : ""?>">
                <?=ucfirst( $session->  username)?></a>
            <?php else: ?>
            <a style="color:#c69328; text-decoration:none; margin-left:10px;" href="<?= base_url()?>login"><i class="fa-solid fa-user"></i> Login</a>
        </div>
        <?php endif ?>
    </div>

</nav>

</div>