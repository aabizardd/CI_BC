        <!--================Deal Timer Area =================-->
        <section class="timer_area">

        </section>
        <!--================End Deal Timer Area =================-->

        <!--================Latest Product Area =================-->
        <section class="feature_product_area latest_product_area">
            <div class="main_box">
                <div class="container">
                    <div class="feature_product_inner">
                        <div class="main_title">
                            <h2>Pesanan Masuk</h2>

                        </div>
                        <!-- <div class="form-group w-25">
                            <select class="form-control" id="opsi1">
                                <option value="">--Pilih--</option>
                                <option value="clean">Clean</option>
                                <option value="beauty">Beauty</option>
                            </select>
                        </div> -->

                        <br><br>
                        <div id="container1">
                            <h4>
                            </h4>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"> No.</th>
                                        <th scope="col"> Nama Konsumen </th>
                                        <!-- <th scope="col"> ID Order </th> -->
                                        <th scope="col"> Nama Product </th>
                                        <th scope="col"> Harga Product </th>
                                        <th scope="col">
                                            <?=$this->session->userdata('role_id') == "Clean" ? "Luas Ruangan" : "Jumlah"?>
                                        </th>
                                        <th scope="col"> Total Biaya </th>
                                        <th scope="col"> Alamat </th>
                                        <th scope="col"> Phone Number </th>
                                        <th scope="col"> Tanggal Pesan </th>
                                        <th scope="col"> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$no = 1;
foreach ($cl as $c): ?>
                                    <tr>
                                        <td scope="col"><?=$no++;?></td>
                                        <td scope="col"><?=$c['namapengorder']?></td>
                                        <!-- <td scope="col"><?=$c['id_order' . $jasa_]?></td> -->
                                        <td scope="col"><?=$c['nama_' . $jasa_]?></td>
                                        <td scope="col"><?=$c['harga_' . $jasa_]?></td>
                                        <td scope="col">
                                            <?=($this->session->userdata('role_id') == "Clean") ? $c['panjang'] * $c['lebar'] . "m<sup>2</sup>" : $c['jumlah']?>
                                        </td>
                                        <td scope="col"><?=$c['total_harga']?></td>
                                        <td scope="col"><?=$c['alamat_pengorder']?></td>
                                        <td scope="col"><?=$c['nomor_pengorder']?></td>
                                        <td scope="col"><?=$c['tanggal_pesan']?></td>
                                        <td scope="col">On Progress (Menuju ke rumah customer) </td>




                                    </tr>
                                    <?php endforeach;?>
                                </tbody>


                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?=base_url('assetsAwal/js/ajax2.js');?>"></script>


        <!--================End Latest Product Area =================-->