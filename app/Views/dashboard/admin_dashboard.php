<?= $this->extend('private_layout')?>
<?= $this->section('content')?>

<section class="dasbord_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">
          <?= $this->include("dashboard/sidebar")?>       
                <div class="right_box">                        
                        <!-- <div class="right_amountbox">
                            <div class="right_txtbox">
                                <div class="user_box">
                                           <h5>200</h5>
                            </div>
                            <div class="right_txtbox1">
                                <div class="user_box">
                                    <h4>Total User</h4>
                                </div>
                                <h5>2000</h5>
                            </div>
                            <div class="right_txtbox2">
                                <div class="user_box">
                                    <h4>Complete</h4>
                                </div>
                                <h5>400</h5>
                            </div>
                            <div class="right_txtbox3">
                                <div class="user_box">
                                    <h4>Pending</h4>
                                </div>
                                <h6>100</h6>
                            </div>
                        </div>
                            <h4>Total Order</h4>
                                </div> -->
    
               
    <!--bootstrap links-->      
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--owl slider link-->


<?= $this->endSection() ?>