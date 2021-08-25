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
                         <h2>DATA PENGGUNA <?=strtoupper($role)?></h2>

                     </div>

                     <?php if ($this->session->flashdata('success')): ?>
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <?=$this->session->flashdata('success')?>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <?php endif?>

                     <div class="form-group col-md-4 mb-5" style="margin-left: -15px;">
                         <!-- <label for="inputState">State</label> -->
                         <select id="inputState" class="form-control" onchange="getComboA(this)">
                             <option selected>Pilih Jenis Pengguna</option>
                             <option value="Konsumen">Konsumen</option>
                             <option value="Clean">Jasa Clean</option>
                             <option value="Beauty">Jasa Beauty</option>
                         </select>
                     </div>



                     <script>
                     function getComboA(selectObject) {
                         var value = selectObject.value;
                         //  alert(value);

                         window.location.href = "<?=base_url('admin/dataUser/')?>" + value;
                     }
                     </script>

                     <center>

                         <table class="table" border=1>
                             <thead class="thead-dark">
                                 <tr>
                                     <th scope="col"> No. </th>
                                     <th scope="col"> Nama User </th>
                                     <th scope="col"> Alamat</th>
                                     <th scope="col"> Email </th>
                                     <th scope="col"> Phone Number</th>
                                     <th scope="col"> <?=$role == "Konsumen" ? "Status" : "Username"?> </th>
                                     <th scope="col"> Gambar </th>
                                     <th scope="col"> <?=$role == "Konsumen" ? "Aktor" : "Rating"?> </th>
                                     <?php if ($role != "Konsumen"): ?>
                                     <th>Status</th>
                                     <th>Aksi</th>
                                     <?php endif?>

                                 </tr>
                             </thead>
                             <?php
$no = 1;
foreach ($allUser as $data) {?>
                             <tr>
                                 <td><?=$no?></td>
                                 <td><?=$data['nama']?></td>
                                 <td><?=$data['alamat']?></td>
                                 <td><?=$data['email']?></td>
                                 <td><?=$data['phone_number']?></td>
                                 <td>

                                     <?php if ($role == "Konsumen"): ?>

                                     <?php if ($data['is_active'] == 1): ?>

                                     Aktif

                                     <?php else: ?>

                                     Tidak Aktif
                                     <?php endif;?>

                                     <?php else: ?>

                                     <?=$data['username']?>

                                     <?php endif?>


                                 </td>
                                 <td>
                                     <img src="<?=base_url('assetsAdmin/img') . '/' . $data['image']?>."' width=' 100'
                                         height='100'">
								</td>
                                        <td>
											<?=($role == "Konsumen") ? $data['role_id'] : round($data['avg'], 1)?>
										</td>

									<?php if ($role != "Konsumen"): ?>
                                     <td><?=($data['is_active'] == 1) ? "Aktif" : "Tidak Aktif"?></td>
                                     <td>
										 <?php if ($data['is_active'] == 1): ?>
										 <a class=" btn btn-danger btn-sm text-white"
                                         href="<?=base_url('admin/ubahStatus/0/' . strtolower($role) . '/' . $data['id'])?>">Non-Aktifkan</a>
                                     <?php else: ?>
                                     <a class=" btn btn-success btn-sm text-white"
                                         href="<?=base_url('admin/ubahStatus/1/' . strtolower($role) . '/' . $data['id'])?>">Aktifkan</a>
                                     <?php endif?>
                                 </td>
                                 <?php endif?>



                             </tr>
                             <?php $no++;}?>
                         </table>
                     </center>
                 </div>
             </form>
         </div>
     </div>

 </section>
 <!--================End Latest Product Area =================-->