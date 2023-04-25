<?php
/* Smarty version 4.2.1, created on 2023-04-24 17:10:08
  from 'C:\wamp64\www\prestashop\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64469bd09f1bc5_44444274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f39e213ca10c6f6244e453f6393539f69ca2b01' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\pdf\\invoice.shipping-tab.tpl',
      1 => 1680162448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64469bd09f1bc5_44444274 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
