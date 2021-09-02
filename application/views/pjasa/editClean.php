 <!--================Deal Timer Area =================-->
 <section class="timer_area">

 </section>
 <!--================End Deal Timer Area =================-->


 <!--================Latest Product Area =================-->
 <section class="feature_product_area latest_product_area">
     <div class="main_box">
         <div class="container">
             <div class="feature_product_inner">
                 <form method="POST" action="<?=base_url('pjasa/editClean/' . $idclean)?>"
                     enctype="multipart/form-data">
                     <div class="main_title">
                         <h2>EDIT JASA CLEAN</h2>
                     </div>
                     <?php foreach ($productClean as $product) {?>
                     <table class="table">
                         <tr>
                             <td>Nama Jasa</td>
                             <td>
                                 <input type="text" name="nama_jasa" value="<?=$product['nama_clean']?>"
                                     class="form-control">
                                 <?=form_error('nama_jasa', '<small class="text-danger">', '</small>');?>
                                 <input type="hidden" name="idclean" value="<?=$product['id_clean']?>">
                             </td>
                         </tr>
                         <tr>
                             <td>Harga Jasa</td>
                             <td><input type="number" name="harga_jasa" value="<?=$product['harga_clean']?>"
                                     class="form-control">
                                 <?=form_error('harga_jasa', '<small class="text-danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Deskripsi Mini</td>
                             <td><textarea class="form-control"
                                     name="desc_mini"><?=$product['descmini_clean']?></textarea>
                                 <?=form_error('desc_mini', '<small class="text-danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Deskripsi</td>
                             <td><textarea class="form-control" name="desc"><?=$product['desc_clean']?></textarea>
                                 <?=form_error('desc', '<small class="text-danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Gambar</td>
                             <td><input class="form-control" type="file" name="gambar"></td>
                             <td><input type="hidden" name="gambar_lama" value="<?=$product['gambar_clean']?>"></td>
                         </tr>
                         <tr>
                             <td>Tipe Produk</td>
                             <td>
                                 <!-- <input type="text" name="tipe"> -->

                                 <select class="form-control" name="tipe">
                                     <option value="">Tipe...</option>
                                     <option <?=$product['tipe_product'] == "home" ? "selected" : ""?> value="home">Home
                                     </option>
                                     <option <?=$product['tipe_product'] == "apartment" ? "selected" : ""?>
                                         value="apartment">
                                         Apartment
                                     </option>
                                     <option <?=$product['tipe_product'] == "kos" ? "selected" : ""?> value="kos">
                                         Kos</option>
                                 </select>

                                 <?=form_error('tipe', '<small class="text-danger">', '</small>');?>
                             </td>
                             <!-- <td><input class="form-control" type="text" name="tipe"
                                     value="<?=$product['tipe_product']?>"></td> -->
                         </tr>

                         <tr>
                             <td><button class="btn btn-primary" type="submit">Submit</button></td>
                         </tr>
                     </table>
                     <?php }?>
                 </form>
             </div>
         </div>
     </div>
     </div>
 </section>





 <!--================End Latest Product Area =================-->
