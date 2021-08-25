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
        							<h2>DATA PENGGUNA</h2>
        						</div>
                                <center>
                                    <table class="table" border = 1>
                                    <thead class="thead-dark">
                                    <tr>
                                    <th scope="col"> No. </th>
                                    <th scope="col"> Nama Penyedia Jasa </th>
                                    <th scope="col"> Alamat</th>
                                    <th scope="col"> Email </th>
                                    <th scope="col"> Phone Number</th>
                                    <th scope="col"> Username </th>
                                    <th scope="col"> Gambar </th>
                                    <th scope="col"> Aksi </th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $no = 1; 
                                    foreach ($allPjasa as $data) { ?>
                                    <tr>
                                        <td><?= $no  ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['phone_number'] ?></td>
                                        <td><?= $data['username'] ?></td>
                                        <td><img src="<?= base_url('assetsAdmin/img').'/'. $data['image']  ?>."'width='100' height='100'"></td>
                                        <td>
                                        <a href="<?= base_url('admin/hapusPjasa').'/'. $data['id'] ?>">hapus</a>
                                        <!-- <input type="hidden" value="<?= $data['id'] ?>">Nonaktif</button> --></td>
                                    </tr>
                                    <?php $no++; } ?>
                                    </table>
                                </center>
        					</div>
                        </form>
    				</div>
            	</div>
            </section>
        <!--================End Latest Product Area =================-->