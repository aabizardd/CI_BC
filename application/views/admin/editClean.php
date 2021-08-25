 <!--================Deal Timer Area =================-->
        <section class="timer_area">
            
        </section>
        <!--================End Deal Timer Area =================-->


<!--================Latest Product Area =================-->
            <section class="feature_product_area latest_product_area">
                <div class="main_box">
                    <div class="container">
                            <div class="feature_product_inner">
                                <form method="POST" action="<?= base_url('admin/editClean') ?>"> 
                                <div class="main_title">
                                    <h2>EDIT JASA CLEAN</h2>
                                </div>
                                    <?php foreach ($productClean as $product) { ?>
                                    <table class="table">
                                    <tr>
                                        <td>Nama Jasa</td>
                                        <td>
                                            <input type="text" name="nama_jasa" value="<?= $product['nama_clean'] ?>">
                                            <input type="hidden" name="idclean" value="<?= $product['id_clean'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Jasa</td>
                                        <td><input type="number" name="harga_jasa" value="<?= $product['harga_clean'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Mini</td>
                                        <td><textarea name="desc_mini"><?= $product['descmini_clean'] ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td><textarea name="desc"><?= $product['desc_clean'] ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Gambar</td>
                                        <td><input type="file" name="gambar"></td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Produk</td>
                                        <td><input type="text" name="tipe" value="<?= $product['tipe_product'] ?>"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><input type="submit" class="btn btn-secondary" name="submit" value="Simpan"></td>
                                    </tr>
                                    </table>
                                <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!--================End Latest Product Area =================-->