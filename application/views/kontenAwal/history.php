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
                            <h2>Riwayat Pesanan <?=strtoupper($riwayat_jasa)?></h2>

                        </div>

                        <?=$this->session->flashdata('pesan')?>


                        <div id="container">




                            <h4></h4>

                            <div class="input-group mb-3 col-3" style="margin-left: -17px;">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Jasa</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" onchange="getComboA(this)">
                                    <option selected>Choose...</option>
                                    <option value="clean">Clean</a>
                                    </option>
                                    <option value="beauty">Beauty</a></option>


                                </select>
                            </div>

                            <script>
                            function getComboA(selectObject) {
                                var value = selectObject.value;
                                // alert(value);

                                window.location.href = "<?=base_url('awal/history/')?>" + value;
                            }
                            </script>

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col"> No.</th>
                                        <th scope="col"> ID User</th>
                                        <th scope="col"> Nama Konsumen </th>
                                        <th scope="col"> ID Order </th>
                                        <th scope="col"> ID Product </th>
                                        <th scope="col"> Nama Product </th>
                                        <th scope="col"> Harga Product </th>
                                        <th scope="col"> Total Harga </th>
                                        <th scope="col"> Alamat </th>
                                        <th scope="col"> Phone Number </th>
                                        <th scope="col"> Keterangan </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$no = 1;
foreach ($ckClean as $cc): ?> <tr>
                                        <td scope="col"><?=$no++;?></td>
                                        <td scope="col"><?=$cc['id_user']?></td>
                                        <td scope="col"><?=$cc['nama']?></td>
                                        <td scope="col"><?=$cc['id_order' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['id_' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['nama_' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['harga_' . $riwayat_jasa]?></td>
                                        <td scope="col"><?=$cc['total_harga']?></td>
                                        <td scope="col"><?=$cc['alamat']?></td>
                                        <td scope="col"><?=$cc['phone_number']?></td>

                                        <?php if ($cc['status'] == 1): ?>
                                        <td scope="col">
                                            Transaksi Selesai
                                            <br><br>
                                            <!-- Button trigger modal -->


                                            <?php if ($cc['rating'] == 0): ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal<?=$cc['id_order' . $riwayat_jasa]?>">
                                                Rating
                                            </button>
                                            <?php endif?>


                                        </td>
                                        <?php elseif ($cc['status'] == 2): ?>
                                        <td scope="col">Transaksi Ditolak
                                            <p class="mt-2">Alasan: <?=$cc['alasan_tolak']?></p>
                                        </td>
                                        <?php else: ?>
                                        <td scope="col">Transaksi Dibatalkan</td>
                                        <?php endif?>




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


        <?php foreach ($ckClean as $key): ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?=$key['id_order' . $riwayat_jasa]?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?=base_url('awal/rating_pesanan/')?>">
                            <div class="form-group">
                                <label for="fader">Rating</label>
                                <input type="range" min="1" max="5" value="3" id="fader" step="0.5"
                                    oninput="outputUpdate(value)" class="form-control-range" name="rating">
                                <output for="fader" id="volume">3</output>
                            </div>

                            <input type="hidden" value="<?=$key['id_pjasa']?>" name="id_jasa">
                            <input type="hidden" value="<?=$riwayat_jasa?>" name="jasa">
                            <input type="hidden" value="<?=$key['id_order' . $riwayat_jasa]?>" name="id_order">

                            <!-- <input type="text" value="<?=$this->session->userdata('id')?>" name="id_jasa"> -->

                            <script>
                            function outputUpdate(vol) {
                                document.querySelector('#volume').value = vol;
                            }
                            </script>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php endforeach;?>