<?= $this->extend('private_layout')?>
<?= $this->section('content')?>

<?= $this->include("dashboard/sidebar")?>

<div class="container section">

    <h2 class="text-center">Register Orders</h2>
    
    <?php foreach($shipping as $user): ?>
    <div class="card shadow mt-3">
        <div class="card-body p-5">
            <div class="card p-3 mb-3">
                <h5> User-Id : <span> <?= $user['user_id']?></span> </h5>
                <h6> Name : <span> <?= $user['username']?></span> </h6>
                <h6> Email : <span> <?= $user['email']?></span> </h6>
                <h6> Phone no. : <span> <?= $user['phone']?></span> </h6>
                <h6> Address : <span> <?= $user['address']?></span> </h6>
                <h6> Pincode : <span> <?= $user['pincode']?></span> </h6>
                <h6> City : <span> <?= $user['city']?></span> </h6>
                <h6> State : <span> <?= $user['state']?></span> </h6>
                <h6>Product Price : <span> <?= $user['total_price']?></span> </h6>
            </div>
           
        </div>
    </div>
    <?php endforeach ?>
</div>




<!--bootstrap links-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!--owl slider link-->


<?= $this->endSection() ?>