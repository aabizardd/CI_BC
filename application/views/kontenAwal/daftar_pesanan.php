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
                            <h2>Pesanan Sedang Dalam Proses (<?=$riwayat_jasa?>)</h2>

                        </div>



                        <div id="container">


                            <?=$this->session->flashdata('pesan')?>


                            <h4></h4>

                            <div class="input-group mb-3 col-3" style="margin-left: -17px;">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Jasa</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" onchange="getComboA(this)">
                                    <option>Choose...</option>
                                    <option value="clean">
                                        <a href="<?=base_url('awal/daftar_pesanan/clean')?>">Clean</a>
                                    </option>
                                    <option value="beauty">
                                        <a href="<?=base_url('awal/daftar_pesanan/beauty')?>">Beauty</a>
                                    </option>


                                </select>
                            </div>

                            <script>
                            function getComboA(selectObject) {
                                var value = selectObject.value;
                                // alert(value);

                                window.location.href = "<?=base_url('awal/daftar_pesanan/')?>" + value;
                            }
                            </script>

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col"> No.</th>
                                        <th scope="col"> Nama Konsumen </th>
                                        <th scope="col"> Nama Product </th>
                                        <th scope="col"> Harga Product </th>
                                        <th scope="col"> Total Harga </th>
                                        <th scope="col"> Alamat </th>
                                        <th scope="col"> Phone Number </th>
                                        <th scope="col"> Keterangan </th>
                                        <th scope="col"> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$no = 1;
foreach ($ckClean as $cc): ?> <tr>
                                        <td scope="col"><?=$no++;?></td>
                                        <td scope="col"><?=$cc['nama']?></td>
                                        <td scope="col"><?=$cc['nama_' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['harga_' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['total_harga']?></td>
                                        <td scope="col"><?=$cc['alamat']?></td>
                                        <td scope="col"><?=$cc['phone_number']?></td>

                                        <?php if ($cc['status'] == 0): ?>
                                        <td scope="col">Sedang Dalam Proses</td>
                                        <?php else: ?>
                                        <td scope="col">Sedang Menuju Ke rumah anda (Diterima)</td>
                                        <?php endif?>

                                        <td scope="col">

                                            <?php if ($cc['status'] == 0): ?>
                                            <a href="<?=base_url('awal/batal_pesanan/' . $cc['id_order' . $riwayat_jasa]) . '/' . $riwayat_jasa?>"
                                                class="badge badge-danger">Batalkan</a>

                                            <?php elseif ($cc['status'] == 4): ?>

                                            <a href="<?=base_url('awal/selesai_pesanan/' . $cc['id_order' . $riwayat_jasa]) . '/' . $riwayat_jasa?>"
                                                class="badge badge-success">Selesai</a>

                                            <?php endif;?>
                                        </td>



                                    </tr>
                                    <?php endforeach;?>
                                </tbody>


                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?=base_url('assetsAwal/js/ajax.js');?>"></script>


        <!--================End Latest Product Area =================-->