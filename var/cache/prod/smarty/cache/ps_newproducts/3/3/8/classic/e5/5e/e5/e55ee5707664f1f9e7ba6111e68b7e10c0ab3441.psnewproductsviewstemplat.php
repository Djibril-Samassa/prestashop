<?php
/* Smarty version 4.2.1, created on 2023-04-24 17:18:46
  from 'module:psnewproductsviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_64469dd6f1c066_93184197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a8df44403a47041b050fac755e17268c2a7c3e7' => 
    array (
      0 => 'module:psnewproductsviewstemplat',
      1 => 1671887250,
      2 => 'module',
    ),
    '985fd1d5c467493d95da5f07fc48d945fd32e1c5' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\classic\\templates\\catalog\\_partials\\productlist.tpl',
      1 => 1671887250,
      2 => 'file',
    ),
    '83dd6d762f92abec44acc92522c8360f5dd88507' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\classic\\templates\\catalog\\_partials\\miniatures\\product.tpl',
      1 => 1671887250,
      2 => 'file',
    ),
    'ca65dc4bb3793545c91c6eb761860cc05e494f0d' => 
    array (
      0 => 'C:\\wamp64\\www\\prestashop\\themes\\classic\\templates\\catalog\\_partials\\product-flags.tpl',
      1 => 1671887250,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_64469dd6f1c066_93184197 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
));
?>
<section class="featured-products clearfix mt-3">
  <h2 class="h2 products-section-title text-uppercase">
    Nouveaux produits
  </h2>
  

<div class="products">
            
<div class="js-product product col-xs-12 col-sm-6 col-lg-4 col-xl-3">
  <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="1">
    <div class="thumbnail-container">
      <div class="thumbnail-top">
        
                      <a href="http://localhost/prestashop/accueil/1-1-defibrillateur-clark.html#/1-pack-pack_basique" class="thumbnail product-thumbnail">
              <img
                src="http://localhost/prestashop/1-home_default/defibrillateur-clark.jpg"
                alt="Défibrillateur clark"
                loading="lazy"
                data-full-size-image-url="http://localhost/prestashop/1-large_default/defibrillateur-clark.jpg"
                width="250"
                height="250"
              />
            </a>
                  

        <div class="highlighted-informations no-variants">
          
            <a class="quick-view js-quick-view" href="#" data-link-action="quickview">
              <i class="material-icons search">&#xE8B6;</i> Aperçu rapide
            </a>
          

          
                      
        </div>
      </div>

      <div class="product-description">
        
                      <h3 class="h3 product-title"><a href="http://localhost/prestashop/accueil/1-1-defibrillateur-clark.html#/1-pack-pack_basique" content="http://localhost/prestashop/accueil/1-1-defibrillateur-clark.html#/1-pack-pack_basique">Défibrillateur clark</a></h3>
                  

        
                      <div class="product-price-and-shipping">
              
              

              <span class="price" aria-label="Prix">
                                                  990,00 €
                              </span>

              

              
            </div>
                  

        
          
<div class="product-list-reviews" data-id="1" data-url="http://localhost/prestashop/module/productcomments/CommentGrade">
  <div class="grade-stars small-stars"></div>
  <div class="comments-nb"></div>
</div>

        
      </div>

      
    <ul class="product-flags js-product-flags">
                    <li class="product-flag new">Nouveau</li>
            </ul>

    </div>
  </article>
</div>

    </div>
  <a class="all-product-link float-xs-left float-md-right h4" href="http://localhost/prestashop/nouveaux-produits">
    Tous les nouveaux produits<i class="material-icons">&#xE315;</i>
  </a>
</section>

<?php }
}
