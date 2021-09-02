 <!--================Deal Timer Area =================-->
 <section class="timer_area">

 </section>
 <!--================End Deal Timer Area =================-->


 <!--================Latest Product Area =================-->
 <section class="feature_product_area latest_product_area">
     <div class="main_box">
         <div class="container">
             <div class="feature_product_inner">
                 <form method="POST" action="<?=base_url('pjasa/editBeauty/' . $idjasa)?>"
                     enctype="multipart/form-data">
                     <div class="main_title">
                         <h2>EDIT JASA CLEAN</h2>
                     </div>
                     <?php foreach ($productBeauty as $product) {?>
                     <table class="table">
                         <tr>
                             <td>Nama Jasa</td>
                             <td>
                                 <input type="text" name="nama_jasa" value="<?=$product['nama_beauty']?>"
                                     class="form-control">
                                 <?=form_error('nama_jasa', '<small class="text-danger">', '</small>');?>
                                 <input type="hidden" name="idbeauty" value="<?=$product['id_beauty']?>">
                             </td>
                         </tr>
                         <tr>
                             <td>Harga Jasa</td>
                             <td>
                                 <input type="number" name="harga_jasa" value="<?=$product['harga_beauty']?>"
                                     class="form-control">
                                 <?=form_error('harga_jasa', '<small class="text-danger">', '</small>');?>
                             </td>
                         </tr>
                         <tr>
                             <td>Deskripsi Mini</td>
                             <td>
                                 <textarea class="form-control" name="desc_mini"><?=$product['descmini_beauty']?>
									</textarea>
                                 <?=form_error('desc_mini', '<small class="text-danger">', '</small>');?>
                             </td>
                         </tr>
                         <tr>
                             <td>Deskripsi</td>
                             <td><textarea name="desc" class="form-control"><?=$product['desc_beauty']?></textarea>
                                 <?=form_error('desc', '<small class="text
								 -danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Gambar</td>
                             <td><input type="file" name="gambar" class="form-control"></td>
                             <td><input type="hidden" name="gambar_lama" class="form-control"
                                     value="<?=$product['gambar_beauty']?>"></td>
                         </tr>
                         <tr>
                             <td>Tipe Produk</td>
                             <td>
                                 <!-- <input type="text" name="tipe"> -->

                                 <select class="form-control" name="tipe">
                                     <option value="">Tipe...</option>
                                     <option <?=$product['tipe_product'] == "hair" ? "selected" : ""?> value="hair">Hair
                                     </option>
                                     <option <?=$product['tipe_product'] == "nail" ? "selected" : ""?> value="nail">Nail
                                     </option>
                                     <option <?=$product['tipe_product'] == "facial" ? "selected" : ""?> value="facial">
                                         Facial</option>
                                 </select>

                                 <?=form_error('tipe', '<small class="text-danger">', '</small>');?>
                             </td>
                             <!-- <td><input type="text" name="tipe" value="<?=$product['tipe_product']?>"></td> -->
                         </tr>

                         <tr>
                             <td><input type="submit" class="btn btn-secondary" name="submit" value="Simpan"></td>
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