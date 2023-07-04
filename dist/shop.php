<?php require_once 'couch/cms.php'; ?>
<cms:template title='Shop' clonable='1' order='2' icon='monitor'>
<cms:editable name='group_images' label='Images' type='group' order='1' />
    <cms:editable
        name='product_image'
        label='Wine Photo'
        width='1280'
        show_preview='1'
        preview_width='150'
        type='image'
        group='group_images'
        order='2'/>
    <cms:editable
        name='pp_product_thumb'
        label='Thumbnail'
        width='420'
        assoc_field='product_image'
        type='jcropthumb'
        crop='1'
        group='group_images'
        order='3'/>
    <cms:editable name='product_desc' label='Description of Product' type='nicedit' order='10'></cms:editable>
   <cms:editable name='group_price' label='Price' type='group' order='2' />
      <cms:editable
           name='pp_price'
           label='Base Price (K)'
           desc='Amount in Zambian Kwacha (correct upto 2 decimal points WITHOUT the K sign)'
           maxlength='6'
           required='1'
           search_type='decimal'
           validator='non_zero_decimal'
           width='150'
           type='text'
           group='group_price'
           order='2'/>
      <cms:editable
           name='explain_discount_scale'
           type='message'
           group='group_price'
           order='3'>
           <b>Quantity based pricing:</b> <i>(Tiered pricing)</i><br/>
           <font color='#777'>If the base price of this product varies based on the quantity purchased (useful for bulk purchases),<br>
           for example, if the base price is K100 but you want the price to be reduced by K10 (i.e. made K90) for purchase of more than 5 bottles, and by K20 (i.e. made K80) for purchase of more than 10 bottle, set it to:</font> <br/>
           <font color='blue'><pre>[ 5=10 | 10=20 ]</pre></font>
           <font color='#777'>where the string above stands for '<i>reduce price by K10 for more than 5, reduce by K20 for more than 10</i>'<br>
           If you want the reduction to be a percentage of the base price (instead of a fixed value as done above), add a '%' sign e.g.<br></font>
           <font color='blue'><pre>[ 5=10 | 10=20 ]%</pre></font>
           <font color='#777'>where the string above now stands for '<i>reduce price by 10% for more than 5, reduce by 20% for more than 10</i>'</font>
      </cms:editable>
      <cms:editable
          name='pp_discount_scale'
          label=':'
          type='text'
          group='group_price'
          validator='regex=/\[\[?([^\]]*)\](\]?)\s*(%?)/'
          order='4'/>
      <cms:editable name='group_variants' label='Variants' type='group' order='5' />
      <cms:editable name='explain_options'
              type='message'
              group='group_variants'
              order='6'>
              <b>Product Variants:</b><br/>
              <font color='#777'>If this product has variants (e.g. Size, Color or a Custom message)
              add each to the box below using the following format:</font> <br/>
              <font color='blue'><pre>
  Color[Red | Black=+3  | Green=-2]
  Size[Large | Medium | Small]*
  Your Message[*TEXT*]
  Your Message[*TEXT*=5]</pre></font>
              <font color='#777'>Note that<br/>
              1. Each variant is on a separate line.<br/>
              2. If an option has a different price than the base price, you can specify the price difference too.<br/>
              For example, the 'Black' option of 'Color' above will add $3 to the base price while the 'Green' will deduct $2. <br>
              3. To create radio buttons instead of a dropdown add a '*' at the end as with 'Size' in the example above. <br/>
              4. To create a textbox (if the variant consists of custom text e.g. message to be printed on T-Shirts), use '*TEXT*' as shown in the third variant above. You can also specify any price difference as shown in the last variant.</font>
          </cms:editable>
          <cms:editable name='pp_options'
              label=':'
              height='130'
              type='textarea'
              group='group_variants'
              order='7'/>
          <cms:editable name='group_delivery' label='Delivery' type='group' order='8' />
          <cms:editable name='pp_requires_delivery'
                  label='Requires delivery'
                  desc='Select No if this is not a physical product that requires delivery'
                  opt_values='Yes=1 | No=0'
                  opt_selected='1'
                  type='radio'
                  group='group_delivery'
                  order='10'/>
          <cms:editable name='explain_delivery_scale'
                  type='message'
                  group='group_delivery'
                  order='20'>
                  <b>Delivery Charges:</b><br/>
                  <font color='#777'>Set the option below if you want to set up a sliding scale of delivery charges based on the number of this item ordered.<br>
                  For example, if you charge K50 to deliver one to five units, K75 to ship six to 15 units, and K100 to ship more than 15 units, set it to:</font> <br/>
                  <font color='blue'><pre>[ 0=50 | 5=75 | 15=100 ]</pre></font>
                  <font color='#777'>where the string above stands for '<i>K50 for more than 0, K75 for more than 5, K100 for more than 15</i>'</font>
              </cms:editable>
              <cms:editable name='pp_delivery_scale'
                  label=':'
                  type='text'
                  validator='regex=/\[\[?([^\]]*)\](\]?)\s*(%?)/'
                  group='group_delivery'
                  order='21'/>

              <cms:config_list_view searchable='1' orderby='weight' order='asc' exclude='default-page' limit='25'>
                  <cms:field 'k_selector_checkbox' />
                  <cms:field 'product_image' header='Photo'>
                    <a href="<cms:show k_update_link/>">
                     <img src="<cms:show pp_product_thumb/>" alt="" width="196"/>
                    </a>
                  </cms:field>
                  <cms:field 'k_page_title' header='Name of Wine' sortable='1'>
                     <p style="font-size:18px; text-align:left"><a href="<cms:show k_update_link/>"><cms:show k_page_title/></a></p>
                     <p style="font-size:12px; text-align:left; padding:6px 0"><cms:show product_desc/></p>
                  </cms:field>
                  <cms:field 'pp_price' header='Price (ZMW)'>
                     <p style="font-size:18px; text-align:left; padding:0 6px"><span style="color:#CCC">K</span>&nbsp;<cms:show pp_price/></p>
                  </cms:field>
                  <cms:field 'pp_discount_scale' header='Discount Scale'>
                     <p style="font-size:16px; text-align:center; align:center padding:0 6px"><cms:show pp_discount_scale/></p>
                  </cms:field>
                  <cms:field 'k_up_down' header='Sort'/>
                  <cms:field 'k_actions' />

                  <cms:style>
                  .col-title{

                  }
                  </cms:style>
              </cms:config_list_view>

         <cms:config_form_view>
            <cms:field 'k_page_title' label='Name of Wine' order='1' />
            <cms:field 'k_page_name' order='99' group='_advanced_settings_'/>
            <cms:field 'description'/>
            <cms:style>
            #k_element_group_images .panel-body{
             display:flex
            }
            </cms:style>
         </cms:config_form_view>
</cms:template>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><cms:show k_template_title/><cms:if k_is_template> | </cms:if><cms:get_custom_field 'site_name' masterpage='globals.php' /></title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  <link href="css/output.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <script async defer data-insites="13dec3ba-1001-4ea5-b4da-18c0a5732daf" src="https://app.pryvy.io/tracker.js"></script>
  <link rel="preload" href="assets/images/logo4.webp" as="image">
  <link rel="preload" href="assets/images/logo4-dark.webp" as="image">
  <meta name="author" content="cholasimmons" />
  <meta name="description" content="<cms:get_custom_field 'site_desc' masterpage='globals.php' />">
  <meta name="image" content="<cms:get_custom_field 'site_logo' masterpage='globals.php' />">
  <script src="<cms:show k_site_link/>js/lazysizes.min.js" async=""></script>
</head>

<body>
  <div id="theme" class="page-wrap dark:bg-sky-950 bg-slate-300" style="background-image: url('assets/images/wine-bg2.webp');">

  <cms:embed 'sidebar.htm'/>
  <cms:embed 'topnav.htm'/>

  <cms:if k_is_list>

  <div class="container mx-auto" style="padding: 8rem 2rem;">
        <section>
           <cms:pages order='desc'>
            <cms:if k_paginated_top>
               <h3 class="inline-block text-2xl font-bold mb-6 dark:text-slate-300">Choose your bottle</h3>
               <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            </cms:if>

          <cms:pp_product_form class="cart-form">
            <a href="<cms:link k_page_link/>">
          <div class="max-w mx-auto bg-white rounded-lg shadow-md overflow-hidden bg-white dark:bg-slate-600">
           <div class="relative h-0 pb-56">
             <img src="assets/images/noThumb.webp" data-src="<cms:show product_image/>" class="relative object-cover w-full h-full lazyload" alt="<cms:show k_page_id/>">
           </div>
           <div class="p-4">
             <h3 class="text-gray-900 dark:text-slate-300 font-medium text-3xl sm:text-xl md:text-2xl lg:text-xl"><cms:show k_page_title/></h3>
             <div class="mt-2">
               <span class="text-gray-700 dark:text-white text-xl md:text-2xl">ZMW <cms:number_format pp_price /></span>
               <input class="product-quantity hidden" type="hidden" name="qty" min="1" step="1" value="1" title="Quantity">
             </div>
             <div class="mt-4">
                <button class="button product-add w-full bg-slate-600 dark:bg-slate-700 hover:bg-slate-500 dark:hover:bg-slate-500 text-white p-4 rounded font-normal justify-center text-xl flex gap-4" type="submit">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" class="w-8 h-8">
                     <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                   </svg>
                   Add bottle to Cart
               </button>
             </div>
           </div>
         </div>
          </a>
         </cms:pp_product_form>

             <cms:no_results><div class="text-center text-2xl py-12 min-h-screen">
                <span class="animate-pulse dark:text-slate-300">Thirsty? Have some water for now while we stock up on more wines.</span>
             </div></cms:no_results>
             <cms:if k_paginated_bottom>
               </div>
             </cms:if>
          </cms:pages>
       </section>
  </div>

  <cms:else/>
            <cms:embed 'detail.html'/>
  </cms:if>

  <cms:embed 'footer.htm'/>

</div>
</body>

<script src="<cms:show k_site_link/>js/main.js" type="text/javascript"></script>
<cms:embed 'cart-modal.htm'/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
    // Set global values for 'js/cart-modal.js' that follows
    var cart_link = "<cms:link "<cms:pp_config 'tpl_ajax_cart' />" />";
    var checkout_link = "<cms:pp_checkout_link />";
</script>
<script src="<cms:show k_site_link/>js/cart-modal.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/input-restriction.js" type="text/javascript"></script>

</html>

<?php COUCH::invoke(); ?>
