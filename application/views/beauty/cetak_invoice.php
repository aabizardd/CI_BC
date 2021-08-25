 <!doctype html>
 <html lang="en">

     <head>
         <!-- Required meta tags -->
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link rel="icon" href="<?=base_url('assetsAwal/')?>img/logoo1.jpg"
             type="<?=base_url('assetsAwal/')?>img/logoo1.jpg">
         <title>BCin aja</title>
         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/bootstrap.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/linericon/style.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/font-awesome.min.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/owl-carousel/owl.carousel.min.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/lightbox/simpleLightbox.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/nice-select/css/nice-select.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/animate-css/animate.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/vendors/jquery-ui/jquery-ui.css">
         <!-- main css -->
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/style.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assetsAwal/css/responsive.css">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


     </head>

     <body>


         <!--================End Home Banner Area =================-->

         <!--================Order Details Area =================-->
         <section class="order_details p_120">
             <div class="container">
                 <h3 class="title_confirmation">INVOICE PEMESANAN</h3>


                 <?php foreach ($orderDetail as $item): ?>

                 <div class="order_details_table">

                     <a href="<?=base_url('beauty/cetak_invoice/' . $item['id_orderbeauty'])?>">
                         <img class="float-right" src="<?=base_url('assetsAdmin/img/printing.png')?>" alt="" width="20">
                     </a>

                     <h2>Order Details</h2>
                     <div class="table-responsive">

                         <table class="table">
                             <thead>
                                 <tr>
                                     <th scope="col">Product</th>
                                     <th scope="col"></th>
                                     <th scope="col">Harga</th>
                                     <th scope="col"></th>
                                     <th scope="col">Jumlah</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         <p><?=$item['nama_beauty']?></p>
                                     </td>
                                     <td>
                                         <h5></h5>
                                     </td>
                                     <td>
                                         <p>Rp <?=$item['harga_beauty']?></p>
                                     </td>
                                     <td>
                                         <h5></h5>
                                     </td>
                                     <td>
                                         <p><?=$item['jumlah']?></p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <h4>Subtotal</h4>
                                     </td>
                                     <td>
                                         <h5></h5>
                                     </td>
                                     <td>
                                         <p>Rp <?=$item['total_harga']?></p>
                                     </td>
                                 </tr>
                                 <!-- <tr>
  								<td>
  									<h4>Shipping</h4>
  								</td>
  								<td>
  									<h5></h5>
  								</td>
  								<td>
  									<p>Flat rate: Rp 50.000</p>
  								</td>
  							</tr> -->
                                 <tr>
                                     <td>
                                         <h4>Total</h4>
                                     </td>
                                     <td>
                                         <h5></h5>
                                     </td>
                                     <td>
                                         <p>Rp <?=$item['total_harga']?></p>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <?php endforeach;?>

             </div>
         </section>




         <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="<?=base_url('assetsUser/');?>js/jquery-3.2.1.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/popper.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/bootstrap.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/stellar.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/lightbox/simpleLightbox.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/isotope/isotope-min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/owl-carousel/owl.carousel.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/jquery.ajaxchimp.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/counter-up/jquery.waypoints.min.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/flipclock/timer.js"></script>
         <script src="<?=base_url('assetsUser/');?>vendors/counter-up/jquery.counterup.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/mail-script.js"></script>
         <script src="<?=base_url('assetsUser/');?>js/theme.js"></script>

         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
             integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
             crossorigin="anonymous">
         </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
             crossorigin="anonymous">
         </script>


         <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
         <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

         <script>
         window.print();
         </script>





     </body>

 </html>
