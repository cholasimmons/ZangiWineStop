<?php require_once 'couch/cms.php'; ?>
<cms:template parent='_system_'/>

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

		<div class="container mx-auto px-6 min-h-screen" style="padding-top: 8rem;">

		<section>
            <cms:if "<cms:pp_count_items />" >
            <div class="message">
                <p class="notice">Please review your order before we proceed to PayPal to make the payment. <br>
                If you have a discount coupon, please apply it below.</p>
                <cms:get_flash 'coupon_flash_msg' />
            </div>
			<div class="w-full">
				<div class="">
                    <table>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <cms:pp_cart_items>
                                <tr>
                                    <td>
                                        <a href="<cms:show link />" class="cart-thumb">
                                            <img src="<cms:show product_thumb />" width="70" height="64" alt="<cms:show title />">
                                        </a>
                                        <div class="desc-box">
                                            <a href="<cms:show link />"><cms:show title /></a>
                                            <p><cms:pp_selected_options separator='<br>' /></p>
                                        </div>
                                    </td>
                                    <td><cms:show quantity /></td>
                                    <td>
                                        <cms:if line_discount><span class="compare-price">ZMW<cms:number_format orig_price /></span></cms:if>
                                        $<cms:number_format price />
                                    </td>
                                    <td>ZMW<cms:number_format line_total /></td>
                                </tr>
                            </cms:pp_cart_items>

                            <cms:if "<cms:pp_discount />" || "<cms:pp_delivery />" || "<cms:pp_taxes />" >
                                <tr>
                                    <td colspan="3">Subtotal</td>
                                    <td>ZMW<cms:number_format "<cms:pp_sub_total />" /></td>
                                </tr>
                            </cms:if>

                            <cms:if "<cms:pp_discount />">
                                <tr>
                                    <td colspan="3">Discount:</td>
                                    <td><span class="subtract">-</span>ZMW<cms:number_format "<cms:pp_discount />" /></td>
                                </tr>
                            </cms:if>

                            <cms:if "<cms:pp_delivery />">
                                <tr>
                                    <td colspan="3">Delivery:</td>
                                    <td>ZMW<cms:number_format "<cms:pp_delivery />" /></td>
                                </tr>
                            </cms:if>

                            <cms:if "<cms:pp_taxes />">
                                <tr>
                                    <td colspan="3">Taxes:</td>
                                    <td>ZMW<cms:number_format "<cms:pp_taxes />" /></td>
                                </tr>
                            </cms:if>

                            <tr>
                                <td colspan="3">Total:</td>
                                <td>ZMW<cms:number_format "<cms:pp_total />" /></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-operations">
                        <div class="coupon-box">

                            <!-- START COUPON FORM -->
                            <cms:form method="post" anchor='0'>
                                <cms:if k_success >
                                    <cms:pages masterpage="<cms:pp_config 'tpl_coupons' />" custom_field="code==<cms:show frm_coupon_code /> | end_date>=<cms:date format='Y-m-d' />" limit='1'>
                                        <cms:no_results>
                                            <cms:delete_session 'coupon_found' />
                                            <cms:delete_session 'coupon_code' />
                                            <cms:delete_session 'coupon_discount' />
                                            <cms:delete_session 'coupon_type' />
                                            <cms:delete_session 'coupon_min_amount' />
                                            <cms:delete_session 'coupon_free_delivery' />

                                            <cms:set_flash name='coupon_flash_msg' value="<p class='error'>Coupon is invalid or expired!</p>" />
                                            <cms:pp_refresh_cart />
                                        </cms:no_results>

                                        <cms:set_session name='coupon_found' value='1' />
                                        <cms:set_session name='coupon_code' value=code />
                                        <cms:set_session name='coupon_discount' value=discount />
                                        <cms:set_session name='coupon_type' value=type />
                                        <cms:set_session name='coupon_min_amount' value=min_amount />
                                        <cms:set_session name='coupon_free_shipping' value=free_shipping />

                                        <cms:if min_amount ge "<cms:pp_sub_total />" >
                                            <cms:set_flash name='coupon_flash_msg' value="<p class='notice'>Coupon discount will be applied when cart total is more than <cms:pp_config 'currency_symbol' /><cms:show min_amount />!</p>" />
                                        <cms:else />
                                            <cms:set_flash name='coupon_flash_msg' value="<p class='success'>Your coupon discount has been applied!</p>" />
                                        </cms:if>
                                        <cms:pp_refresh_cart />
                                    </cms:pages>

                                    <cms:redirect k_page_link />
                                </cms:if>

                                <cms:input type="text" placeholder="Enter coupon code" name="coupon_code" value="<cms:get_session 'coupon_code' />" class="coupon-input"/>
                                <input type="submit" value="Apply" class="button coupon-button"/>

                            </cms:form>
                            <!-- END COUPON FORM -->

                        </div>
                        <div class="edit-cart-box">
                            <a href="<cms:pp_cart_link />" class="button" >Edit Cart</a>
                        </div>
                    </div>

                    <cms:form method="post" anchor='0'>
                        <cms:if k_success >
                            <cms:pp_payment_gateway
                                shipping_address="<cms:if "<cms:pp_count_shippable_items />" >1<cms:else />0</cms:if>"
                                empty_cart='0'
                            />
                        </cms:if>
                        <div class="checkout-box">
                            <cms:input name="paypal" class="button checkout-button" type="submit" value="Continue to PayPal" />
                        </div>
                    </cms:form>

				</div>

			</div>
            <cms:else />
                <div class="message">
                    <p class="info">Your cart is empty!</p>
                </div>
            </cms:if>
		</section>
	</div>

	<cms:embed 'footer.htm'/>
</div>
<script src="<cms:show k_site_link/>js/main.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
</body>
</html>
<?php COUCH::invoke(); ?>
