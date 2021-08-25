 <!--================Deal Timer Area =================-->
 <section class="timer_area">

 </section>
 <!--================End Deal Timer Area =================-->


 <!--================Latest Product Area =================-->
 <section class="feature_product_area latest_product_area">
     <div class="main_box">



         <div class="container">
             <div class="feature_product_inner">
                 <form method="POST" action="<?=base_url('pjasa/tambahBeauty')?>" enctype="multipart/form-data">
                     <div class="main_title">
                         <h2>INPUT JASA BEAUTY</h2>
                     </div>

                     <!-- alert file -->
                     <?php if ($this->session->flashdata('alert_file')): ?>
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Mohon maaf!</strong> <?=$this->session->flashdata('alert_file')?>.
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <?php endif?>


                     <table class="table">
                         <tr>
                             <td>Nama Jasa</td>
                             <td>
                                 <input type="text" name="nama_jasa" class="form-control ">
                                 <?=form_error('nama_jasa', '<small class="text-danger">', '</small>');?>
                             </td>

                         </tr>
                         <tr>
                             <td>Harga Jasa</td>
                             <td><input type="number" name="harga_jasa" class="form-control ">
                                 <?=form_error('harga_jasa', '<small class="text-danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Deskripsi Mini</td>
                             <td><input type="text" name="desc_mini" class="form-control">
                                 <?=form_error('desc_mini', '<small class="text-danger">', '</small>');?></td>
                         </tr>
                         <tr>
                             <td>Deskripsi</td>
                             <td><input type="text" name="desc" class="form-control">
                                 <?=form_error('desc', '<small class="text-danger">', '</small>');?>
                             </td>
                         </tr>
                         <tr>
                             <td>Gambar</td>
                             <td><input type="file" name="gambar"></td>
                         </tr>
                         <tr>
                             <td>Tipe Produk</td>
                             <td>
                                 <!-- <input type="text" name="tipe"> -->

                                 <select class="form-control" name="tipe">
                                     <option selected value="">Tipe...</option>
                                     <option value="hair">Hair</option>
                                     <option value="nail">Nail</option>
                                     <option value="facial">Facial</option>
                                 </select>

                                 <?=form_error('tipe', '<small class="text-danger">', '</small>');?>
                             </td>
                         </tr>

                         <tr>
                             <td><input type="submit" class="btn btn-secondary" name="submit" value="Simpan"></td>
                         </tr>
                     </table>
                 </form>
             </div>
         </div>
     </div>
     </div>
 </section>
 <!--================End Latest Product Area =================-->