<?php require_once 'couch/cms.php'; ?>
<cms:template title='Home / Slideshow' order='3' icon='home'>
   <cms:repeatable name='carousel'>
      <cms:editable
          name='image'
          label='Carousel Image'
          width='1920'
          show_preview='1'
          preview_width='150'
          type='image' />
   </cms:repeatable>
</cms:template>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><cms:get_custom_field 'site_name' masterpage='globals.php' /></title>
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

<body class="min-h-screen">
  <div id="theme" class="dark:bg-sky-950 bg-slate-300 h-full flex flex-col" style="background-image: url('assets/images/wine-bg2.webp');">

  <cms:embed 'sidebar.htm'/>
  <cms:embed 'topnav.htm'/>


  <div class="hero-carousel relative z-0" style="height:70vh !important">
     <cms:if carousel>
        <cms:show_repeatable 'carousel'>
             <div class="hero-carousel-item absolute inset-0 bg-cover bg-center transition-opacity duration-500 opacity-0">
               <img class="w-full h-full object-cover" src="<cms:show image/>" alt="">
             </div>
        </cms:show_repeatable>
     <cms:else/>
        <div class="absolute inset-0 bg-cover bg-center">
           <img class="w-full h-full object-cover" src="assets/images/carousel/00.jpg" alt="">
        </div>
     </cms:if>
  </div>

  <div class="container mx-auto py-12 px-6 md:text-center md:justify-items-center justify-center inset-0">
    <h1 class="text-4xl font-bold mb-4 dark:text-gray-300">Welcome to <cms:get_custom_field 'site_name' masterpage='globals.php' /></h1>
    <p class="mb-4 text-lg dark:text-slate-200"><cms:get_custom_field 'home_caption' masterpage='globals.php'/></p>
    <a href="<cms:link 'shop.php'/>" class="bg-sky-900 dark:bg-slate-300 text-white dark:text-sky-900 p-4 mt-2 inline-block rounded font-medium hover:bg-sky-800 dark:hover:bg-slate-100">Browse our Store</a>
  </div>

<cms:pages 'shop.php' order='weight'>
   <cms:if k_paginated_top>
     <div class="container mx-auto my-10 px-6">
      <h3 class="inline-block text-2xl font-bold mb-6 dark:text-slate-300">Most Popular</h3>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
   </cms:if>

   <cms:pp_product_form class="cart-form">
   <div class="max-w mx-auto overflow-hidden rounded-lg flex flex-col justify-between bg-white dark:bg-slate-600">
      <div>
        <div class="relative pb-2/3 min-w-full">
          <img src="assets/images/noThumb.webp" data-src="<cms:show product_image/>" class="relative object-contain  lazyload"  alt="<cms:show k_page_id/>">
        </div>
        <div class="px-4 py-2">
          <h3 class="text-gray-900 dark:text-slate-300 font-medium text-3xl sm:text-xl md:text-2xl lg:text-xl"><cms:show k_page_title/></h3>
          <div class="mt-2">
            <span class="text-gray-700 dark:text-white text-2xl md:text-xl">ZMW <cms:number_format pp_price /></span>
          </div>
        </div>
     </div>
     <div class="p-4">
      <button class="button product-add w-full bg-slate-600 dark:bg-slate-700 hover:bg-slate-500 dark:hover:bg-slate-500 text-white p-4 rounded font-normal justify-center text-xl flex gap-4" type="submit">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" class="w-8 h-8">
             <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
           </svg>
           Add bottle to Cart
      </button>
   </div>
 </div>
 </cms:pp_product_form>

   <cms:no_results>
   <div class="text-center text-2xl py-12 min-h-screen">
      <!--img src="assets/images/wine-glass-2.gif"/-->
      <span class="animate-pulse dark:text-slate-300">Store is being stocked up.</span>
   </div>
   </cms:no_results>
   <cms:if k_paginated_bottom>
      </div>
   </div>
   </cms:if>
</cms:pages>

  <cms:embed 'footer.htm'/>
</div>
</body>
<script src="<cms:show k_site_link/>js/main.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
    // Set global values for 'js/cart-modal.js' that follows
    var cart_link = "<cms:link "<cms:pp_config 'tpl_ajax_cart' />" />";
    var checkout_link = "<cms:pp_checkout_link />";
</script>
<script src="<cms:show k_site_link/>js/cart-modal.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/input-restriction.js" type="text/javascript"></script>

</html>
<cms:embed 'cart-modal.htm'/>
<?php COUCH::invoke(); ?>
