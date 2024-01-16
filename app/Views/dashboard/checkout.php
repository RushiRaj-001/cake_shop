<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-3 px-5  ">
    <div class="container-fluid text-dark mt-4 my-3 py-4 px-5 shadow text-dark"
        style="border-radius: 15px; padding: 20px;">
        <h2 class="text-center font-weight-bold ">Shipping Details</h2>
        <form class="mb-3" action="<?base_url('checkout')?>" method="post">
            <div class="mt-5 mb-4 d-flex" style="gap: 12%;">
                <div class="username" style="display: flex; align-items: center;">
                    <label for="Username" class="mb-0 form-label font-weight-bold" style="width: 25%;">Name:</label>
                    <input type="text" class="form-control" value="<?= $username ?>" id="username" name="username"
                        required="" readonly="" style="overflow: auto;">
                </div>
                <div class="phone" style="display: flex; align-items: center;">
                    <label for="phone" class="mb-0 form-label font-weight-bold" style="width: 40%;">Phone No. :</label>
                    <input type="tel" class="form-control" placeholder="Enter Your Phone Number" value=""
                        id="phone" name="phone" required="">
                </div>

            </div>
            <div class="mb-4">
                <label for="email" class="form-label font-weight-bold">Email Id :</label>
                <input type="text" class="form-control" value="<?= $email ?>"  id="email" name="email"
                    required="" readonly="" style="overflow: auto;">

            </div>
            <div class="mb-4">
                <label for="address" class="form-label font-weight-bold">Address:</label>
                <textarea type="text " class="form-control" placeholder="Enter Your Address" value="" id="address"
                    name="address" required=""></textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="pincode" class="form-label font-weight-bold">Pincode:</label>
                    <input type="number" class="form-control" placeholder="Enter Your Pincode" value="" id="pincode"
                        name="pincode" onchange="getLocationInfo()" required="">
                </div>

                <div class="col-md-4 mb-4">
                    <label for="city" class="form-label font-weight-bold">City:</label>
                    <input type="text" class="form-control" placeholder="Enter Your City" value="" id="city" name="city"
                        required="">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="state" class="form-label font-weight-bold">State:</label>
                    <input type="text" class="form-control" placeholder="Enter Your state" value="" id="state"
                        name="state" required="">
                </div>
 
            </div>
            <?php 
            $final = $totalItemPrice + 40 
            ?>
            <div class="mb-4">
                <label for="amount" class="form-label font-weight-bold">Total Amount:</label>
                <input type="number " class="form-control" id="total_price" name="amount" value="<?= $final?>"  required="" readonly="">
            </div>
            <div class="mb-4 text-center">
                <a href="<?= base_url()?>checkout" onclick="addAddress()" class="btn btn-outline-success w-50 justify-content-center" type="submit">Proceed to
                    Pay</a>
            </div>

        </form>
    </div>

  
</div>
<?= $this->endSection() ?>