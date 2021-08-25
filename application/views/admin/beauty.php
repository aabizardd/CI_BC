<!--================Deal Timer Area =================-->
<section class="timer_area">

</section>
<!--================End Deal Timer Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area latest_product_area">
    <div class="main_box">
        <div class="container">
            <form action="phpindex.php" method="POST">
                <div class="feature_product_inner">
                    <div class="main_title">
                        <h2>DATA JASA BEAUTY</h2>
                    </div>
                    <center>
                        <table class="table" border=1>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> No. </th>
                                    <th scope="col"> Nama Jasa </th>
                                    <th scope="col"> Harga </th>
                                    <th scope="col"> Deskripsi Mini </th>
                                    <th scope="col"> Deskripsi </th>
                                    <th scope="col"> Gambar </th>
                                    <th scope="col"> Tipe Produk </th>
                                    
                                </tr>
                                <?php $no = 1;foreach ($productBeauty as $product) {?>
                                <tr>
                                    <td scope="col"> <?=$no;?> </td>
                                    <td scope="col"> <?=$product['nama_beauty'];?> </td>
                                    <td scope="col"> <?=$product['harga_beauty'];?> </td>
                                    <td scope="col"> <?=$product['descmini_beauty'];?> </td>
                                    <td scope="col"> <?=$product['desc_beauty'];?> </td>
                                    <td scope="col"><img
                                            src="<?=base_url('assetsAwal/img/product/feature-product') . '/' . $product['gambar_beauty']?>."
                                            width="100%">
                                    </td>
                                    <td scope="col"> <?=$product['tipe_product'];?> </td>
                                    
                                        
                                   
                                </tr>
                            </thead>
                            <?php $no++;}?>
                        </table>
                       

                    </center>
                </div>
            </form>
        </div>
    </div>
</section>

<!--================End Latest Product Area =================-->