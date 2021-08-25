         <!--================Home Banner Area =================-->
         <section class="banner_area">
             <div class="banner_inner d-flex align-items-center">
                 <div class="container">
                     <div class="banner_content text-center">
                         <h2>Pilih Penyedia Jasa Beauty</h2>


                     </div>

                 </div>



         </section>

         <!--================End Home Banner Area =================-->
         <form class="form-inline mt-2" style="margin-left: 90px;margin-bottom: -90px;margin-right: 90px;" method="GET"
             action="<?=base_url('beauty/product/' . $this->uri->segment(3))?>">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>


         <!--================Category Product Area =================-->
         <center>

             <section class="cat_product_area p_120">


                 <div class="latest_product_inner row">



                     <?php foreach ($products as $productbeauty) {?>

                     <div class="col-lg-4 col-md-4 col-sm-6">
                         <div class="f_p_item">
                             <a href="<?=base_url('Beauty/beli_product') . '/' . $productbeauty['id_beauty'];?>">
                                 <div class="f_p_img">
                                     <img class="img-fluid"
                                         src="<?=base_url('assetsAwal/img/product/feature-product/' . $productbeauty['gambar_beauty'])?>"
                                         width="300px" alt="">
                                 </div>
                             </a>
                             <a href="<?=base_url('Beauty/beli_product') . '/' . $productbeauty['id_beauty'];?>">
                                 <h4><?=$productbeauty['nama_beauty'];?></h4>
                             </a>
                             <p><?=$productbeauty['desc_beauty']?></p>

                             <?php $hasil_rupiah = "Rp " . number_format($productbeauty['harga_beauty'], 2, ',', '.');?>

                             <h5><?=$hasil_rupiah?>
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
