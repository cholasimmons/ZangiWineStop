<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

require_once( K_COUCH_DIR.'addons/cart/cart.php' );
require_once( K_COUCH_DIR.'addons/data-bound-form/data-bound-form.php' );
//require_once( K_COUCH_DIR.'addons/inline/inline.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
//require_once( K_COUCH_DIR.'addons/routes/routes.php' );
require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );
// require_once( K_COUCH_DIR.'addons/page-builder/page-builder.php' );
// require_once( K_COUCH_DIR.'addons/mosaic/mosaic.php' );

// Custom Views
//$FUNCS->register_admin_listview( 'clients.php', 'clients_listview.html' );
//$FUNCS->register_admin_pageview( 'students.php', 'members_edit.html' );

// $FUNCS->register_admin_listview( 'cart-modal.php', 'shop_listview.html' );
// $FUNCS->register_admin_pageview( 'about-us/calendar.php', 'calendar_pageview.html' );


// Admin sidepanel

if( defined('K_ADMIN') ){
    $FUNCS->add_event_listener( 'register_admin_menuitems', 'my_register_admin_menuitems' );

    function my_register_admin_menuitems(){
        global $FUNCS;

        // $FUNCS->register_admin_menuitem( array('name'=>'_users_', 'title'=>'Users', 'is_header'=>'1', 'weight'=>'2')  );
        $FUNCS->register_admin_menuitem( array('name'=>'_system_', 'title'=>'System Files', 'is_header'=>'1', 'weight'=>'5')  );
    }
}
