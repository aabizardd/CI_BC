 <!--================Home Banner Area =================-->
 <section class="banner_area">
     <div class="banner_inner d-flex align-items-center">
         <div class="container">
             <div class="banner_content text-center">
                 <h2>Product Page</h2>

             </div>
         </div>
     </div>
 </section>
 <!--================End Home Banner Area =================-->

 <!--================Single Product Area =================-->
 <div class="product_image_area">
     <div class="container">
         <div class="row s_product_inner">
             <div class="col-lg-6">
                 <div class="s_product_img">
                     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <?php foreach ($products as $p): ?>
                                 <img class="d-block w-100"
                                     src="<?php echo base_url() ?>assetsAwal/img/product/feature-product/<?=$p['gambar_beauty']?>"
                                     alt="First slide">

                                 <div class="mt-2">
                                     <?php $link = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
                                     <strong>Bagikan ke :</strong> <br>
                                     <div class="mt-2">
                                         <a href="whatsapp://send?text=Lihat nih ada paket yang bagus di <?=$link?>"
                                             data-action="share/whatsapp/share">
                                             <img src="<?=base_url('assetsAdmin/img/whatsapp.png')?>" alt="" width="20">
                                         </a>
                                     </div>

                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-5 offset-lg-1">
                 <h3><?=$p['nama_beauty']?></h3>
                 <form action="<?=base_url("beauty/prosesCheckout")?>" method="post">
                     <h2>Rp <?=$p['harga_beauty']?></h2>
                     <input type="hidden" name="harga" value="<?=$p['harga_beauty']?>">
                     <input type="hidden" name="clean" value="<?=$p['id_beauty']?>">
                     <input type="hidden" name="iduser" value="<?=$this->session->userdata('id')?>">
                     <input type="hidden" name="nm" value="<?=$this->session->userdata('nama')?>">
                     <input type="hidden" name="alm" value="<?=$this->session->userdata('alamat')?>">
                     <input type="hidden" name="ph" value="<?=$this->session->userdata('phone')?>">
                     <ul class="list">
                         <li><a class="active" href="#"><span>Category</span> : Package</a></li>
                     </ul>
                     <p>
                     <h5> <?=$p['nama_beauty']?> </h5>
                     <p style="text-align: justify;"><?=$p['desc_beauty']?></p>
                     <strong>Menyediakan Jasa :</strong> <br>
                     <p style="text-align: justify;"><?=$p['descmini_beauty']?></p>
                     </p>

                     <label for="qty">Tanggal Pesan:</label>
                     <input type="text" class="form-control datepicker" placeholder="yy/mm/dd" name="tgl_pesan"
                         autocomplete="off" required>

                     <label for="qty">Jam Pesan:</label>
                     <select class="custom-select" id="inputGroupSelect01" name="jam_pesan" required>
                         <option selected value="">Pilih...</option>
                         <?php foreach ($jam_order as $jam): ?>
                         <option value="<?=number_format($jam, 2)?>"><?=number_format($jam, 2)?></option>
                         <?php endforeach;?>
                     </select>

                     <label for="qty">Alamat Pemesan:</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pesan"
                         required></textarea>

                     <div class="product_count mt-2">
                         <label for="qty">Berdasarkan Jumlah Orang:</label>
                         <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                             class="input-text qty">
                         <button
                             onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                             class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                         <button
                             onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                             class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                     </div>
                     <div class="card_area">
                         <button class="main_btn" type="submit">Order Now</button>
                 </form>

             </div>
         </div>
         <?php endforeach;?>
     </div>
 </div>
 </div>
 </div>
 <!--================End Single Product Area =================-->
 <!--================Product Description Area =================-->
 <section class="product_description_area">
     <div class="container">

     </div>
 </section>
 <!--================End Product Description Area =================-->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script>
$('.datepicker').datepicker({
    minDate: 0,
    // maxDate: '+1w',
    dateFormat: 'yy/mm/dd'
});
 </script>