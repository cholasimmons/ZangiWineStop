<?php require_once 'couch/cms.php'; ?>
    <cms:template title='Coupons' clonable='1' executable='0' icon='puzzle-piece'>

        <cms:editable name='desc' label='Description' type='textarea' height='70' />
        <cms:editable name='code' label='Code' width='155' required='1' type='text' />
        <cms:editable
            name='discount'
            label='Discount'
            search_type='decimal'
            validator='non_negative_decimal'
            width='155'
            type='text'/>
        <cms:editable
            name='type'
            label='Type'
            opt_values='Percentage=0 | Fixed Amount=1'
            type='dropdown'/>
        <cms:editable
            name='min_amount'
            label='Minimum Amount'
            desc='Minimum cart value before this disount applies'
            search_type='decimal'
            validator='non_negative_decimal'
            width='155'
            type='text'/>
        <cms:editable
            name='free_delivery'
            label='Free Delivery'
            opt_values='Yes=1 | No=0'
            opt_selected = '0'
            type='radio'/>
        <cms:editable
            name='end_date'
            label='End Date'
            desc='Coupon expiry date'
            type='datetime'
            validator='regex=/(?:19|20)\d\d-(?:0[1-9]|1[012])-(?:0[1-9]|[12][0-9]|3[01])/'
            allow_time='1'
            separator='#'
            validator_msg='regex=Incorrect date format'
            required='1'
            width='155' default_time='@current'/>



       <cms:config_list_view searchable='1' orderby='weight' order='asc' exclude='default-page' limit='25'>

           <cms:field 'k_selector_checkbox' />
           <cms:field 'k_page_title' header='Coupon Title' sortable='1'>
             <a href="<cms:show k_update_link/>"><cms:show k_page_title/></a>
           </cms:field>

           <cms:field 'free_delivery' header='Delivery'>
            <cms:if free_delivery>FREE<cms:else/>None</cms:if>
           </cms:field>
           <cms:field 'end_date' header='Expiration'>
            <cms:set todayy = "<cms:date format='Ymd'/>" global/>
            <cms:set enddate = "<cms:date end_date format='Ymd'/>" global/>

            <span class="<cms:if enddate lt todayy>danger</cms:if>"><cms:date end_date format='d, M Y'/></span>
           </cms:field>
           <cms:field 'discount' header='Discount'>
             <p style="font-size:16px; text-align:center; align:center; padding:0 6px"><cms:if type><span style="color:#bbb">ZMW&nbsp;</span></cms:if><cms:show discount/><cms:if type == '0'><span style="color:#999">%</cms:if></p>
           </cms:field>
           <cms:field 'code' header='Code'>
             <p style="font-size:16px; text-align:center; align:center; padding:0 6px"><cms:show code/></p>
           </cms:field>
           <cms:field 'k_up_down' header='Sort'/>
           <cms:field 'k_actions' />
           <cms:style>
              .col-end_date, .col-discount, .col-type{
                font-size:14px;
                text-align:center;
                align:center;
                padding:0 6px
              }
              .col-title, .col-free_delivery{
                font-size:14px;
                text-align:left;
                align:center;
                padding:0 6px
              }
              .danger {
                 color:red; font-weight:bold;
              }
           </cms:style>
       </cms:config_list_view>

       <cms:config_form_view>
         <cms:field 'k_page_title' header='Coupon Title' sortable='1'/>
         <cms:field 'k_page_name' hide='1'/>
         <cms:field 'code' />
         <cms:field 'discount' />
         <cms:field 'type' />

         <cms:style>
            #k_element_code, #k_element_discount, #k_element_type {
               width: 33%; display: inline-table;
            }
         </cms:style>
       </cms:config_form_view>

    </cms:template>
<?php COUCH::invoke(); ?>
