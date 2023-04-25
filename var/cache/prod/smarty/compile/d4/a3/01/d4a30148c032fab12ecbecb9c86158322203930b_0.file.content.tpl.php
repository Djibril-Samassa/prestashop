<?php
/* Smarty version 4.2.1, created on 2023-04-24 17:02:02
  from 'C:\wamp64\www\prestashop\admin413hpr1nsxpruffkv5y\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_644699ea6237b4_87297077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a30148c032fab12ecbecb9c86158322203930b' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\admin413hpr1nsxpruffkv5y\\themes\\default\\template\\content.tpl',
      1 => 1680162448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644699ea6237b4_87297077 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>
<div id="content-message-box"></div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
