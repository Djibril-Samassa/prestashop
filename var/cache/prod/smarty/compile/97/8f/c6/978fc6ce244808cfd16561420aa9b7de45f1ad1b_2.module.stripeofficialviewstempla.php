<?php
/* Smarty version 4.2.1, created on 2023-04-24 16:59:18
  from 'module:stripeofficialviewstempla' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_644699464d8924_84989927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '978fc6ce244808cfd16561420aa9b7de45f1ad1b' => 
    array (
      0 => 'module:stripeofficialviewstempla',
      1 => 1681479374,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644699464d8924_84989927 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p class="js-stripe-notice"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You will be redirected to an external payment page.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</p>
<?php }
}
