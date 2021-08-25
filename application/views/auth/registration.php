<!--================Login Box Area =================-->
<section class="login_box_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="<?=base_url('assetsAwal')?>/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                        <a class="main_btn" href="#">Create an Account</a>
                        <br>
                        <a href="<?=base_url('auth/forgot_password')?>" style=" color: #fff;">Forgot
                            Password</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner reg_form">
                    <h3>Create an Account</h3>
                    <form class="row login_form" action="<?=base_url('Auth/registration')?>" method="post"
                        id="contactForm" novalidate="novalidate">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Daftar Sebagai?</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="role_id">
                                <option selected>Choose...</option>
                                <option value="Konsumen">Konsumen</option>
                                <option value="Clean">Jasa Clean</option>
                                <option value="Beauty">Jasa Beauty</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                value="<?=set_value('name');?>">
                        </div>
                        <?=form_error('name', '<small class="text-danger pl-3">', '</small>');?>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                        </div>
                        <?=form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                                value="<?=set_value('email');?>">
                        </div>
                        <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Phone Number">
                        </div>
                        <?=form_error('phone_number', '<small class="text-danger pl-3">', '</small>');?>
                        <div class="col-md-12 form-group">
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Username" value="<?=set_value('username');?>">
                        </div>
                        <?=form_error('username', '<small class="text-danger pl-3">', '</small>');?>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <?=form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="pass" name="pass"
                                placeholder="Confirm password">
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
