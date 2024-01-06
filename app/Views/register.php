<?= $this->extend('public_layout')?>
<?= $this->section('content')?>

<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 mt-5"
                style="box-shadow: 0px 1px 10px 0px #000000; border-radius:20px; background: #fff;">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-4">Register</h3>
       
                        
                        <form action="<?=base_url('register')?>" method="post">

                            <div class="mb-2">
                                <label for="username">Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="username"
                                       >       
                            </div>
                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       >       
                            </div>
                            <div class="mb-2">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="mb-2">
                                <label for="cpassword">Confirm Password</label>
                                <input type="text" class="form-control" name="cpassword">
                            </div>
                            <div class="mb-2 text-center">
                                <input type="submit" name="register" value="Register" class="btn btn-primary">
                            </div>


                        </form>

                        <br>
						<span>Already have Account ,</span>
						<a href="<?= base_url() ?>login">Login</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include("footer") ?>
<?= $this->endsection()?>