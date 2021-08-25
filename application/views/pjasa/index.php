<!--================Deal Timer Area =================-->
<section class="timer_area">
    <div class="container" style="text-align: center;">
        <h1>Hai <?=$this->session->userdata('username')?>, Selamat datang!</h1>
    </div>
</section>
<!--================End Deal Timer Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area latest_product_area">

    <div class="main_box">

        <div class="container">
            <div class="feature_product_inner">
                <div class="main_title">
                    <h2>DATA PENGELOLA JASA CLEAN</h2>
                </div>

                <?php if ($this->session->flashdata('p_success')): ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?=$this->session->flashdata('p_success')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php endif?>

                <center>
                    <table class="table" border=1>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> No.</th>
                                <th scope="col"> Nama Jasa </th>
                                <th scope="col"> Harga </th>
                                <th scope="col"> Deskripsi Mini </th>
                                <th scope="col"> Deskripsi </th>
                                <th scope="col"> Gambar </th>
                                <th scope="col"> Tipe Produk </th>
                                <th scope="col"> Aksi </th>
                            </tr>
                        </thead>
                        <?php $no = 1;
foreach ($AllProductClean as $product) {?>

                        <?php $hasil_rupiah = "Rp " . number_format($product['harga_clean'], 2, ',', '.');?>

                        <tr>
                            <td scope="col"> <?=$no;?> </td>
                            <td scope="col"> <?=$product['nama_clean'];?> </td>
                            <td scope="col"> <?=$hasil_rupiah?> </td>
                            <td scope="col"> <?=$product['descmini_clean'];?> </td>
                            <td scope="col"> <?=$product['desc_clean'];?> </td>
                            <td scope="col"><img
                                    src="<?=base_url('assetsAwal/img/product/feature-product') . '/' . $product['gambar_clean']?>."
                                    width="300"></td>
                            <td scope="col"> <?=$product['tipe_product'];?> </td>
                            <td scope="col">
                                <a href="<?=base_url('pjasa/hapusClean') . '/' . $product['id_clean'];?>">
                                    <span class="badge badge-danger">Hapus</span><br>
                                </a>
                                <a href="<?=base_url('pjasa/editClean') . '/' . $product['id_clean'];?>">
                                    <span class="badge badge-primary">Edit</span>
                                </a>
                            </td>

                        </tr>
                        <?php $no++;}?>
                    </table>
                    <a href="<?=base_url('pjasa/tambahClean')?>">
                        <div class="main_title">
                            <div class="alert alert-dark" role="alert">
                                Tambah Jasa
                            </div>
                        </div>
                    </a>


                </center>
            </div>
        </div>
    </div>
</section>
<!--================End Latest Product Area =================-->