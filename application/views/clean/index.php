        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Pilih Penyedia Jasa Clean</h2>

                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Category Product Area =================-->
        <center>
            <section class="cat_product_area p_120">

                <div class="latest_product_inner row">
                    <?php foreach ($avg_rating as $productclean) {?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="f_p_item">
                            <a href="<?=base_url('Clean/product') . '/' . $productclean['id'];?>">
                                <div class="f_p_img">
                                    <img class="img-fluid"
                                        src="<?=base_url('assetsAdmin/img/' . $productclean['image'])?>" width="200px"
                                        alt="">
                                </div>
                            </a>
                            <a href="<?=base_url('Clean/product') . '/' . $productclean['id'];?>">
                                <h4><?=$productclean['nama'];?></h4>
                            </a>
                            <p><?=$productclean['alamat'];?></p>




                            <h5>Rating <font class="text-warning"><?=number_format($productclean['avg'], 2)?></font>



                            </h5>
                        </div>
                    </div>

                    <?php }?>
                </div>
                </div>


                </div>
                </div>
            </section>
        </center>
        <!--================End Category Product Area =================-->



        <!--================ start footer Area  =================-->

        <!--================ End footer Area  =================-->
