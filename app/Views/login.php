<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>
<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 mt-5"
                style="box-shadow: 0px 1px 10px 0px #000000; border-radius:20px; background: #fff;">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <h3 class="mb-4">Login</h3>
						<?php $session=session(); ?>
						<?php if(! is_null($session->getFlashdata('failed_message'))) :?>
							<div class="alert alert-danger">
								<?= $session->getFlashdata('failed_message');?>
							</div>
						<?php endif ?>
                        
                        <form action="<?=base_url('login')?>" method="post">

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

                            <div class="mb-2 text-center">
                                <input type="submit" name="login" value="Login" class="btn btn-primary">
                            </div>

                        </form>
                
						<br>
						<span>Don't have Account ,</span>
						<a href="<?= base_url() ?>register">Register</a>
                    </div>
                </div>
                <?php if (isset($loginButton)) : ?>
                     <a href="<?= $loginButton; ?>"><img src="<?= base_url() ?>/public/Assets/googlebtn.png" width="60%" alt="button"></a>
             <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->include("footer") ?>
<?= $this->endsection() ?>