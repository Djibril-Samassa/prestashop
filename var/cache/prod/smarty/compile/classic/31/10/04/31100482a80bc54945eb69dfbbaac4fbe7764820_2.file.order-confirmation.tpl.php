<?php
/* Smarty version 4.2.1, created on 2023-04-24 17:10:12
  from 'C:\wamp64\www\prestashop\modules\stripe_official\views\templates\front\order-confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64469bd4da9543_92621401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31100482a80bc54945eb69dfbbaac4fbe7764820' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\modules\\stripe_official\\views\\templates\\front\\order-confirmation.tpl',
      1 => 1681479374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64469bd4da9543_92621401 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Congratulations, your order has been placed and will be processed soon.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
</b><br /><br />

<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your order reference is [b]@target@[/b], you should receive a confirmation e-mail shortly.','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
ob_start();
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripe_order_reference']->value,'htmlall' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable2 = ob_get_clean();
ob_start();
echo htmlspecialchars((string) $_prefixVariable2, ENT_QUOTES, 'UTF-8');
$_prefixVariable3 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable1,array('@target@'=>$_prefixVariable3));?>
<br /><br />

<?php if ($_smarty_tpl->tpl_vars['stripePayment']->value->type == 'oxxo') {?>
    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Your can see your OXXO voucher [a @href1@]here[/a].','mod'=>'stripe_official'),$_smarty_tpl ) );
$_prefixVariable4 = ob_get_clean();
ob_start();
echo htmlspecialchars((string) call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['stripePayment']->value->voucher_url,'htmlall' )), ENT_QUOTES, 'UTF-8');
$_prefixVariable5 = ob_get_clean();
ob_start();
echo htmlspecialchars((string) $_prefixVariable5, ENT_QUOTES, 'UTF-8');
$_prefixVariable6 = ob_get_clean();
ob_start();
echo htmlspecialchars((string) 'target="blank"', ENT_QUOTES, 'UTF-8');
$_prefixVariable7 = ob_get_clean();
echo smarty_modifier_stripelreplace($_prefixVariable4,array('@href1@'=>$_prefixVariable6,'@target@'=>$_prefixVariable7));?>
<br /><br />
<?php }?>

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'We appreciate your business.','mod'=>'stripe_official'),$_smarty_tpl ) );?>
<br /><br /></p><?php }
}
