 <!--================Deal Timer Area =================-->
        <section class="timer_area">
            
        </section>
        <!--================End Deal Timer Area =================-->


<!--================Latest Product Area =================-->
            <section class="feature_product_area latest_product_area">
                <div class="main_box">
                    <div class="container">
                            <div class="feature_product_inner">
                                <form method="POST" action="<?= base_url('admin/tambahBeauty') ?>"> 
                                <div class="main_title">
                                    <h2>INPUT JASA BEAUTY</h2>
                                </div>
                                    <table class="table">
                                    <tr>
                                        <td>Nama Jasa</td>
                                        <td><input type="text" name="nama_jasa" value="<?= set_value('nama_jasa'); ?>"></td>
                                    </tr>
                                        <?= form_error('name_jasa', '<small class="text-danger pl-3">' ,'</small>');?>
                                      
                                    <tr>
                                        <td>Harga Jasa</td>
                                        <td><input type="number" name="harga_jasa"></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Mini</td>
                                        <td><input type="text" name="desc_mini"></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td><input type="text" name="desc"></td>
                                    </tr>
                                    <tr>
                                        <td>Gambar</td>
                                        <td><input type="file" name="gambar"></td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Produk</td>
                                        <td><input type="text" name="tipe"></td>
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