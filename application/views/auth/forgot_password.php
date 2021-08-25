    <!--================Login Box Area =================-->
    <section class="login_box_area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="<?=base_url('assetsAwal/')?>img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of
                                this is the</p>
                            <a class="main_btn" href="<?=base_url('Auth/registration')?>">Create an Account</a><br>
                            <a href="<?=base_url('auth')?>" style="color: #fff;">Login</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Forgot Password</h3>

                        <div class="container">
                            <?=$this->session->flashdata('message')?>
                        </div>


                        <form class="row login_form" action="<?=base_url('auth/forgot_password')?>" method="post"
                            id="contactForm" novalidate="novalidate">









                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    autocomplete="off">
                            </div>
                            <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="main_btn">Kirim link</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--================End Login Box Area =================-->
