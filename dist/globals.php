<?php require_once 'couch/cms.php'; ?>
<cms:template title='Global Settings' executable='0' order='10' icon='cog' parent='_administration_'>
   <cms:editable name='site_name' label='Website Name' type='text'>Zangi Wine Stop</cms:editable>
   <cms:editable name='site_desc' label='Website\'s description' type='text'></cms:editable>
   <cms:editable name='site_logo' label='Website Logo' desc='Square logo used as preview when you share website link' width='360' show_preview='1' type='image'><cms:show k_site_link/>assets/images/ZangiWineStop_favicon.png</cms:editable>
   <cms:editable name='home_caption' label='Home caption' height='28' type='textarea'>
   We offer a wide variety of wines from all over the world. Browse our products and find your favorite.
   </cms:editable>
   <cms:editable name='sms_line' label='Manager\'s SMS Number' desc='full international format with the \'+\'' type='text'>+260966785053</cms:editable>
   <cms:editable name='whatsapp_line' label='Manager\'s Whatsapp Number' desc='international number without the \'+\'' type='text'>260966785053</cms:editable>
   <cms:editable name='default_whatsapp_msg' label='Default Whatsapp Message' desc='Default whatsapp message Users send to Zangi' type='text'>Hello, I am interested in your products.</cms:editable>
   <cms:editable name='email_address' label='Manager\'s Email' type='text'>ken.simms@gmail.com</cms:editable>
</cms:template>
<div style="text-align:center;margin-top:4rem;font-size:2rem;font-family:'sans-serif'">
   Page Unavailable
</div>
<?php COUCH::invoke(); ?>
