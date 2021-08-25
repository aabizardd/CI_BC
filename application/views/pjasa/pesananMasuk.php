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
                        <?=$this->session->flashdata('pesan')?>

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
                                        <th scope="col"> Tanggal Pesanan </th>
                                        <th scope="col"> Status </th>
                                        <th scope="col"> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $hari = array(1 => 'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu',
);
?>
                                    <?php
$no = 1;
foreach ($cl as $c): ?>

                                    <?php
$num = date('N', strtotime($c['tanggal_pesan']));

$day = $hari[$num];?>
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
                                        <td scope="col">
                                            <?=$day . ", " . date('d-m-Y', strtotime($c['tanggal_pesan'])) . " " . $c['jam_pesan']?>
                                        </td>
                                        <td scope="col">Proses </td>

                                        <td scope="col">
                                            <?php $jasa = strtolower($c['role_id'])?>

                                            <a class="badge badge-success text-white"
                                                href="<?=base_url('pjasa/prosesPesanan/terima/' . $jasa_ . '/' . $c['id_order' . $jasa_])?>">Terima</a>
                                            <!-- <a class="badge badge-danger text-white"
                                                href="<?=base_url('pjasa/prosesPesanan/tolak/' . $jasa_ . '/' . $c['id_order' . $jasa_])?>">Tolak</a> -->

                                            <!-- Button trigger modal -->
                                            <a class="badge badge-danger text-white modal-tolak" data-toggle="modal"
                                                data-target="#exampleModal" data-id="<?=$c['id_order' . $jasa_]?>">
                                                Tolak
                                            </a>

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

        <!-- Modal -->
        <div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?=base_url('pjasa/tolakPesanan')?>" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alasan
                                Penolakan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="alasann" class="custom-control-input"
                                    value="Maaf, Pesanan sedang ramai">
                                <label class="custom-control-label" for="customRadio1">Maaf, Pesanan sedang
                                    ramai</label>
                            </div>

                            <div class="custom-control custom-radio mt-2">
                                <input type="radio" id="customRadio2" name="alasann" class="custom-control-input"
                                    value="Maaf, Konsumen tidak dapat dihubungi">
                                <label class="custom-control-label" for="customRadio2">Maaf, Konsumen tidak dapat
                                    dihubungi</label>
                            </div>

                            <div class="custom-control custom-radio mt-2">
                                <input type="radio" id="customRadio3" name="alasann" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">
                                    Alasan lain
                                    <input type="text" class="form-control" aria-label="Text input with radio button"
                                        name="alasan" autocomplete="off">
                                </label>
                            </div>

                            <input type="hidden" name="id_order" id="id_order" value="">

                            <!-- <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="Radio button for following text input">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with radio button">
                        </div> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="<?=base_url('assetsAdmin/');?>js/jquery-3.2.1.min.js"></script>
        <script src="<?=base_url('assetsAwal/js/ajax2.js');?>"></script>

        <script type="text/javascript">
$(function() {
    $(".modal-tolak").click(function() {
        var idOrder = $(this).data('id');
        // alert(idOrder)
        $(".modal-body #id_order").val(idOrder);
    })

});
        </script>









        <!--================End Latest Product Area =================-->
