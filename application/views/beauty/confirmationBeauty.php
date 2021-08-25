  <!--================Home Banner Area =================-->
  <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
          <div class="container">
              <div class="banner_content text-center">
                  <h2>Order Confirmation</h2>

              </div>
          </div>
      </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Order Details Area =================-->
  <section class="order_details p_120">
      <div class="container">
          <h3 class="title_confirmation">Thank you. Your order has been received.</h3>


          <?php foreach ($orderDetail as $item): ?>

          <div class="order_details_table">

              <a href="<?=base_url('beauty/cetak_invoice/' . $item['id_orderbeauty'])?>" target="_blank">
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

  <!--================End Order Details Area =================-->