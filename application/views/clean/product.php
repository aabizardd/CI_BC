        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Shop Category Clean</h2>

                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <form class="form-inline mt-2" style="margin-left: 90px;margin-bottom: -90px;margin-right: 90px;" method="GET"
            action="<?=base_url('clean/product/' . $this->uri->segment(3))?>">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!--================Category Product Area =================-->
        <center>
            <section class="cat_product_area p_120">

                <div class="latest_product_inner row">
                    <?php foreach ($products as $productclean) {?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="f_p_item">
                            <a href="<?=base_url('Clean/beli_product') . '/' . $productclean['id_clean'];?>">
                                <div class="f_p_img">
                                    <img class="img-fluid"
                                        src="<?=base_url('assetsAwal/img/product/feature-product/' . $productclean['gambar_clean'])?>"
                                        width="300px" alt="">
                                </div>
                            </a>
                            <a href="<?=base_url('Clean/beli_product') . '/' . $productclean['id_clean'];?>">
                                <h4><?=$productclean['nama_clean'];?></h4>
                            </a>
                            <p><?=$productclean['desc_clean'];?></p>

                            <?php $hasil_rupiah = "Rp " . number_format($productclean['harga_clean'], 2, ',', '.');?>


                            <h5><?=$hasil_rupiah?>
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
