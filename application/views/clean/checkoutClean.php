 
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Product Checkout</h2>
						
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Checkout Area =================-->
        <section class="checkout_area p_120">
        	<div class="container">
        		<div class="returning_customer">
        		</div>
        		
        		<div class="billing_details">
        			<div class="row">
        				<div class="col-lg-8">
        					<h3>Billing Details</h3>
        					<form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="add1">
                                    <span class="placeholder" data-placeholder="Full Name "></span>
                                </div>
								<div class="col-md-6 form-group p_star">
									<input type="text" class="form-control" id="number" name="number">
									<span class="placeholder" data-placeholder="Phone number"></span>
								</div>
								<div class="col-md-6 form-group p_star">
									<input type="text" class="form-control" id="email" name="compemailany">
									<span class="placeholder" data-placeholder="Email Address"></span>
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="add1" name="add1">
									<span class="placeholder" data-placeholder="Address line "></span>
								</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										<h3>Shipping Details</h3>
									</div>
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
								</div>
							</form>
        				</div>
        				<div class="col-lg-4">
        					<div class="order_box">
        						<h2>Your Order</h2>
        						<ul class="list">
        							<li><a href="#">Product <span>Total</span></a></li>
        							<li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
        							<li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
        							<li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
        						</ul>
        						<ul class="list list_2">
        							<li><a href="#">Subtotal <span>$2160.00</span></a></li>
        							<li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
        							<li><a href="#">Total <span>$2210.00</span></a></li>
        						</ul>
        						
        						<div class="payment_item active">
        							<div class="radion_btn">
        							</div>
        						</div>
       							<a class="main_btn" href="<?= base_url('Clean/confirmationClean')?>">Proceed to Paypal</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Checkout Area =================-->