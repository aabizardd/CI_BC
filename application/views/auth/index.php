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
                            <a href="<?=base_url('auth/forgot_password')?>" style="color: #fff;">Forgot
                                Password</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <?php if ($login_as == "Clean" || $login_as == "Beauty"): ?>
                        <h3>Log in as penyedia jasa <?=$login_as?></h3>
                        <?php else: ?>
                        <h3>Log in as <?=$login_as?></h3>
                        <?php endif;?>




                        <form class="row login_form" action="<?=base_url('Auth')?>" method="post" id="contactForm"
                            novalidate="novalidate">



                            <?=$this->session->flashdata('message');?>


                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username">
                            </div>
                            <?=form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                            <div class="col-md-12 form-group">
                                <input type="Password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <?=form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn submit_btn">Log In</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--================End Login Box Area =================-->