<?php require_once 'couch/cms.php'; ?>
<cms:template title='Cart' order='5' parent='_system_'/>
<cms:no_cache />
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><cms:show k_template_title/><cms:if k_is_template> | </cms:if><cms:get_custom_field 'site_name' masterpage='globals.php'/></title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
   <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
   <link href="css/output.css" rel="stylesheet">
   <link href="css/styles.css" rel="stylesheet">
	<script async defer data-insites="13dec3ba-1001-4ea5-b4da-18c0a5732daf" src="https://app.pryvy.io/tracker.js"></script>
   <link rel="preload" href="assets/images/logo4.webp" as="image">
   <link rel="preload" href="assets/images/logo4-dark.webp" as="image">
	<!--[if lt IE 9]>
		<script src="js/ie9.js" type="text/javascript"></script>
	<![endif]-->
</head>
<body class="min-h-screen">
	<div id="theme" class="dark:bg-sky-950 bg-slate-300 dark:text-slate-300 text-sky-900" style="background-image: url('assets/images/wine-bg2.webp');">
		<cms:embed 'sidebar.htm'/>
		<cms:embed 'topnav.htm'/>

		<div class="container mx-auto px-6 min-h-screen inline-0" style="padding-top: 8rem;">
			<section>
            <cms:if "<cms:get_flash 'cart_flash_msg' />" >
                <div class="message">
                    <cms:get_flash 'cart_flash_msg' />
                </div>
            </cms:if>

            <cms:if "<cms:pp_count_items />" >

					<cms:pp_cart_form>
						<table class="w-full table-auto border-separate border-spacing-2 border border-slate-500">
							<thead class="bg-red-500">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>Item</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
                     <cms:pp_cart_items>
                        <tr class="text-center">
                           <td><a href="<cms:pp_remove_item_link />" class="cart-remove p-2" title="Remove">&times;<span class="screen-reader p-2">Remove</span></a></td>
                           <td>
                             <a href="<cms:show link />" class="cart-thumb">
                               <img src="<cms:show pp_product_thumb />" width="70" height="64" alt="<cms:show title />">
                             </a>
                             <div class="desc-box">
                               <a href="<cms:show link />"><cms:show title /></a>
                               <p><cms:pp_selected_options separator='<br>' /></p>
                             </div>
                           </td>
                           <td><input name="qty[<cms:show line_id />]" class="quantity-input text-center bg-red-500" style="background-color:transparent;width:64px" type="number" min="0" step="1" value="<cms:show quantity />" title="Quantity"></td>
                           <td>
                             <cms:if line_discount>
									  	<span class="compare-price">ZMW<cms:number_format orig_price /></span>
									  </cms:if>
                             ZMW<cms:number_format price />
                           </td>
                           <td>ZMW<cms:number_format line_total /></td>
                        </tr>
                     </cms:pp_cart_items>

                     <cms:if "<cms:pp_discount />" || "<cms:pp_delivery />" || "<cms:pp_taxes />" >
                       <tr>
                         <td colspan="4">Subtotal</td>
                         <td>ZMW<cms:number_format "<cms:pp_sub_total />" /></td>
                       </tr>
                     </cms:if>

                     <cms:if "<cms:pp_discount />">
                     <tr>
                       <td colspan="4">Discount:</td>
                       <td><span class="subtract">-</span>ZMW<cms:number_format "<cms:pp_discount />" /></td>
                     </tr>
                   </cms:if>

                   <cms:if "<cms:pp_delivery />">
                     <tr>
                       <td colspan="4">Delivery:</td>
                       <td>ZMW<cms:number_format "<cms:pp_delivery />" /></td>
                     </tr>
                   </cms:if>

                   <cms:if "<cms:pp_taxes />">
                      <tr>
                         <td colspan="4">Taxes:</td>
                         <td>ZMW<cms:number_format "<cms:pp_taxes />" /></td>
                      </tr>
                   </cms:if>

						<tr>
							<td colspan="4">Total:</td>
							<td>ZMW<cms:number_format "<cms:pp_total />" /></td>
						</tr>
					</tbody>
				</table>

				<div class="cart-operations">
							<div class="checkout-box">
								<input class="bg-white-500 rounded checkout-button" type="submit" name="checkout" value="Checkout">
							</div>
							<div class="update-box">
								<input class="button update-button" type="submit" value="Update Quantities">
							</div>
				</div>
			</cms:pp_cart_form>


            <cms:else />
					<div class="message text-center text-2xl py-12 min-h-screen">
						<span class="info animate-pulse dark:text-slate-300">Your cart is empty.</span>
					</div>
            </cms:if>

		</section>
	</div>
	<cms:embed 'footer.htm'/>
</div>
	<script src="<cms:show k_site_link/>js/main.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
	<script src="<cms:show k_site_link/>js/input-restriction.js" type="text/javascript"></script>
</body>
</html>
<?php COUCH::invoke(); ?>
