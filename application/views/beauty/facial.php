         <!--================Home Banner Area =================-->
         <section class="banner_area">
         	<div class="banner_inner d-flex align-items-center">
         		<div class="container">
         			<div class="banner_content text-center">
         				<h2>Shop Category Page</h2>
         				
         			</div>
         		</div>
         	</div>
         </section>
         <!--================End Home Banner Area =================-->

         <!--================Category Product Area =================-->
         <center>
         	<section class="cat_product_area p_120">

         		<div class="latest_product_inner row">
         			<?php foreach ($allBeautyTreat as $productbeauty) { ?>
         				<div class="col-lg-4 col-md-4 col-sm-6">
         					<div class="f_p_item">
         						<div class="f_p_img">
         							<img class="img-fluid" src="<?= base_url('assetsAwal/'); ?>img/product/feature-product/<?= $productbeauty['gambar_beauty'] ?> " width=400px" alt="">
         						</div>
         						<a href="<?= base_url('beauty/product/') . $productbeauty['id_beauty'] ?>">
         							<h4><?= $productbeauty['nama_beauty'] ?></h4>
         						</a>
         						<p><?= $productbeauty['descmini_beauty'] ?></p>
         						<h5>Rp. <?= $productbeauty['harga_beauty'] ?></h5>
         					</div>
         				</div>
         			<?php } ?>
         		</div>
         		</div>


         		</div>
         		</div>
         	</section>
         </center>
         <!--================End Category Product Area =================-->
