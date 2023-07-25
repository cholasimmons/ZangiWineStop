<?php require_once 'couch/cms.php'; ?>
<cms:template title='Home' order='3' icon='home'>
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
  <link href="css/splide-sea-green.min.css" rel="stylesheet">
  <script async defer data-insites="13dec3ba-1001-4ea5-b4da-18c0a5732daf" src="https://app.pryvy.io/tracker.js"></script>

  <meta name="author" content="cholasimmons" />
  <meta name="description" content="<cms:get_custom_field 'site_desc' masterpage='globals.php' />">
  <meta name="image" content="<cms:get_custom_field 'site_logo' masterpage='globals.php' />">
  <script src="<cms:show k_site_link/>js/lazysizes.min.js" async=""></script>
</head>

<body class="min-h-screen">
  <cms:embed 'sidebar.htm'/>
  <cms:embed 'topnav.htm'/>

  <!--/** Hero Carousel **/-->
  <section class="w-full h-44 sm:h-72 md:h-96">
    <div class="h-full max-w-6xl mx-auto overflow-hidden">
      <section id="slider1" class="splide h-full w-full p-0" role="group" aria-label="Beautiful Slides">
        <div class="splide__track">
          <ul class="splide__list">
            <cms:if carousel>
              <cms:show_repeatable 'carousel'>
                  <li class="splide__slide">
                    <img src="<cms:show image/>" alt="">
                  </li>
              </cms:show_repeatable>
            <cms:else/>
              <li class="splide__slide">
                <img src="assets/images/carousel/00.jpg" alt="">
              </li>
            </cms:if>
          </ul>
        </div>
      </section>
    </div>
  </section>

  <!--/** Content **/-->
  <section class=" text-center py-16 flex flex-col justify-items-center dark:bg-stone-700 bg-stone-200">
    <div class="max-w-6xl mx-auto px-6 text-amber-950 dark:text-stone-300">
      <h1 class="text-2xl md:text-4xl font-bold mb-4 ">Welcome to <cms:get_custom_field 'site_name' masterpage='globals.php' /></h1>
      <p class="mb-4 md:text-lg "><cms:get_custom_field 'home_caption' masterpage='globals.php'/></p>
      <a href="shop/detail.html" class="btnn sm:w-fit">Browse our Products</a>
    </div>
  </section>

  <!--/** Wine Summary **/-->
  <div class="max-w-6xl mx-auto my-10 px-6">
    <h3 class="w-full inline-block text-xl font-medium mb-4 mx-auto text-yellow-950 md:text-center">Most Popular</h3>
    <!--/** Most Popular Card Slider **/-->

    <cms:pages 'shop.php' order='weight'>
      <cms:if k_paginated_top>
        <section id="slider2" class="splide h-full w-full p-0" aria-label="Beautiful Slides">
          <div class="splide__track">
            <ul class="splide__list">
      </cms:if>
            <cms:pp_product_form class="cart-form">
              <li class="splide__slide">
                <div class="max-w bg-stone-100 dark:bg-yellow-950 hover:shadow-lg rounded-md overflow-hidden flex flex-col justify-between ">
                  <a href="<cms:show k_page_link/>">
                    <div class="w-full">
                      <img assets="/images/noThumb.webp" data-src="<cms:show product_image/>" alt="<cms:show k_page_id/>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 lazyload">
                    </div>
                    <div class="p-4 m-0">
                      <h1 class="text-yellow-950 dark:text-stone-100 font-semibold text-lg md:text-xl"><cms:show k_page_title/></h1>
                      <div class="mt-2 flex justify-between items-center">
                        <div>⭐⭐⭐⭐⭐</div>
                        <div class="smallCurrency"><small>K</small> <cms:number_format pp_price /></div>
                      </div>
                    </div>
                  </a>
      
                  <div class="p-4 pt-0">
                      <button class="btnn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="4" stroke="currentColor" class="w-6 h-6 block sm:hidden">
                          <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <span class="hidden md:block">Add to Cart</span>
                        <span class="block md:hidden">Add</span>
                      </button>
                  </div>
                </div>
              </li>
            </cms:pp_product_form>
      <cms:if k_paginated_bottom>
            </ul>
          </div>
        </section>
      </cms:if>
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
  </div>

  <cms:embed 'footer.htm'/>
</body>
<script type="text/javascript" src="<cms:show k_site_link/>js/splide.min.js"></script>
<script src="<cms:show k_site_link/>js/config.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
    // Set global values for 'js/cart-modal.js' that follows
    var cart_link = "<cms:link "<cms:pp_config 'tpl_ajax_cart' />" />";
    var checkout_link = "<cms:pp_checkout_link />";

    const options1 = {
    pagination: false,
    arrows: false,
    perPage: 1,
    type: 'loop',
    autoplay: true,
    speed: 600,
  }
  
  const options2 = {
    pagination: false,
    arrows: false,
    perPage: 5,
    gap: 8,
    type: 'loop',
    breakpoints: {
      480: {
        perPage: 1,
      },
      720: {
        perPage: 2,
      },
      960: {
        perPage: 3,
      },
      1580: {
        perPage: 4,
      },
    }
  }

  new Splide( '#slider1', options1 ).mount();
  new Splide( '#slider2', options2 ).mount();
</script>
<script src="<cms:show k_site_link/>js/cart-modal.js" type="text/javascript"></script>
<script src="<cms:show k_site_link/>js/input-restriction.js" type="text/javascript"></script>

</html>
<cms:embed 'cart-modal.htm'/>
<?php COUCH::invoke(); ?>
