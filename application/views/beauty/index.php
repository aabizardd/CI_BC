         <!--================Home Banner Area =================-->
         <section class="banner_area">
             <div class="banner_inner d-flex align-items-center">
                 <div class="container">
                     <div class="banner_content text-center">
                         <h2>Pilih Penyedia Jasa Beauty</h2>

                     </div>
                 </div>
             </div>
         </section>
         <!--================End Home Banner Area =================-->

         <!--================Category Product Area =================-->
         <center>
             <section class="cat_product_area p_120">

                 <div class="latest_product_inner row">
                     <?php foreach ($allpjasa_beauty as $productbeauty) {?>
                     <div class="col-lg-4 col-md-4 col-sm-6">
                         <div class="f_p_item">
                             <div class="f_p_img">
                                 <img class="img-fluid"
                                     src="<?=base_url('assetsAdmin/img/' . $productbeauty['image'])?>" width="200px"
                                     alt="">
                             </div>
                             <a href="<?=base_url('beauty/product/') . $productbeauty['id']?>">
                                 <h4><?=$productbeauty['nama']?></h4>
                             </a>
                             <p><?=$productbeauty['alamat']?></p>
                             <h5>Rating <font class="text-warning"><?=number_format($productbeauty['avg'], 2);?></font>
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
