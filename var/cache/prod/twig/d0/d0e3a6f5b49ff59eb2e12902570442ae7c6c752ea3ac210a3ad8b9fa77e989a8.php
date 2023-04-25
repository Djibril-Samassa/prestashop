<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__dff128fe93df51a016b377f23bb0b854a59dc2fb6475e3c9a164efb0910e150e */
class __TwigTemplate_0d16be2da3ed6ef9b9e63820dc4d8ed51c9b9134662ce64aa54d2818df502499 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/prestashop/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/prestashop/img/app_icon.png\" />

<title>Thème et logo > Thème • prestashop</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminThemes';
    var iso_user = 'fr';
    var lang_is_rtl = '0';
    var full_language_code = 'fr';
    var full_cldr_language_code = 'fr-FR';
    var country_iso_code = 'FR';
    var _PS_VERSION_ = '8.0.2';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Une nouvelle commande a été passée sur votre boutique.';
    var order_number_msg = 'Numéro de commande : ';
    var total_msg = 'Total : ';
    var from_msg = 'Du ';
    var see_order_msg = 'Afficher cette commande';
    var new_customer_msg = 'Un nouveau client s\\'est inscrit sur votre boutique';
    var customer_name_msg = 'Nom du client : ';
    var new_msg = 'Un nouveau message a été posté sur votre boutique.';
    var see_msg = 'Lire le message';
    var token = '0d39f3a53bce268e3bddc7b67c0410e7';
    var token_admin_orders = tokenAdminOrders = '97097618c30b589220c305dba4a3382d';
    var token_admin_customers = 'adf6bafdff89bad744ed5c53fe7da8d8';
    var token_admin_customer_threads = tokenAdminCustomerThreads = '1de79f51425543d330e786148c66eee5';
    var currentIndex = 'index.php?controller=AdminThemes';
    var employee_token = '19e7d9e1b4d013574f1a5453b168e2b7';
    var choose_language_translate = 'Choisissez la langue :';
    var default_language = '1';
    var admin_modules_link = '/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/modules/manage?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY';
    var admin_notification_get_link = '/prestashop/admin413hpr1nsxpruf";
        // line 42
        echo "fkv5y/index.php/common/notifications?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY';
    var admin_notification_push_link = adminNotificationPushLink = '/prestashop/admin413hpr1nsxpruffkv5y/index.php/common/notifications/ack?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY';
    var tab_modules_list = '';
    var update_success_msg = 'Mise à jour réussie';
    var search_product_msg = 'Rechercher un produit';
  </script>



<link
      rel=\"preload\"
      href=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/new-theme/public/703cf8f274fbb265d49c6262825780e1.preload.woff2\"
      as=\"font\"
      crossorigin
    >
      <link href=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/blockwishlist/public/backoffice.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/ps_mbo/views/css/cdc-error-templating.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/psxmarketingwithgoogle/views/css/admin/menu.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/prestashop/modules/ps_facebook/views/css/admin/menu.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/prestashop\\/admin413hpr1nsxpruffkv5y\\/\";
var baseDir = \"\\/prestashop\\/\";
var changeFormLanguageUrl = \"\\/prestashop\\/admin413hpr1nsxpruffkv5y\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euro\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"";
        // line 71
        echo "\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var number_specifications = {\"symbol\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var prestashop = {\"debug\":false};
var show_new_customers = \"1\";
var show_new_messages = \"1\";
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/admin.js?v=8.0.2\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/tools.js?v=8.0.2\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/blockwishlist/public/vendors.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_emailalerts/js/admin/ps_emailalerts.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/admin413hpr1nsxpruffkv5y/themes/default/js/vendor/nv.d3.min.js\"></script>
";
        // line 89
        echo "<script type=\"text/javascript\" src=\"/prestashop/modules/ps_mbo/views/js/cdc-error-templating.js\"></script>
<script type=\"text/javascript\" src=\"https://assets.prestashop3.com/dst/mbo/v1/mbo-cdc.umd.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_mbo/views/js/recommended-modules.js?v=4.4.0\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/prestashop/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>

  <script>
            var admin_gamification_ajax_url = \"http:\\/\\/localhost\\/prestashop\\/admin413hpr1nsxpruffkv5y\\/index.php?controller=AdminGamification&token=0c481e548ef5b8b6b0910a781276a583\";
            var current_id_tab = 44;
        </script><script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/prestashop/admin413hpr1nsxpruffkv5y/index.php/common/notifications?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>


";
        // line 113
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>";
        echo "

<body
  class=\"lang-fr adminthemes\"
  data-base-url=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php\"  data-token=\"G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\">

  <header id=\"header\" class=\"d-print-none\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminDashboard&amp;token=3c5fea18a087d8ebc04d5bf26cae2a7c\"></a>
      <span id=\"shop_version\">8.0.2</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Accès rapide
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminModules&amp;&amp;configure=classy_custom_js_cs&amp;token=395234e093d038e9757b97b15a295d0d\"
                 data-item=\"ClassyDevs Custom CSS and JS\"
      >ClassyDevs Custom CSS and JS</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders?token=b517329a9d1d202149bd7a32a28f95af\"
                 data-item=\"Commandes\"
      >Commandes</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=15f35ac6d16567e93bdba5ce472520ea\"
                 data-item=\"Évaluation du catalogue\"
      >Évaluation du catalogue</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/modules/manage?tok";
        // line 147
        echo "en=b517329a9d1d202149bd7a32a28f95af\"
                 data-item=\"Modules installés\"
      >Modules installés</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=31a119daaa0ac9e10c14da122da70f0a\"
                 data-item=\"Nouveau bon de réduction\"
      >Nouveau bon de réduction</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/products/new?token=b517329a9d1d202149bd7a32a28f95af\"
                 data-item=\"Nouveau produit\"
      >Nouveau produit</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/categories/new?token=b517329a9d1d202149bd7a32a28f95af\"
                 data-item=\"Nouvelle catégorie\"
      >Nouvelle catégorie</a>
        <div class=\"dropdown-divider\"></div>
          <a id=\"quick-add-link\"
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"161\"
        data-icon=\"icon-AdminThemesParent\"
        data-method=\"add\"
        data-url=\"index.php/improve/design/themes\"
        data-post-link=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminQuickAccesses&token=b7975fd313d1eab6a6f60d6ae11e8df2\"
        data-prompt-text=\"Veuillez nommer ce raccourci :\"
        data-link=\"Th&egrave;me et logo - Liste\"
      >
        <i class=\"material-icons\">add_circle</i>
        Ajouter la page actuelle à l'accès rapide
      </a>
        <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminQuickAccesses&token=b7975fd313d1eab6a6f60d6ae11e8df2\">
      <i class=\"material-icons\">settings</i>
      Gérez vos accès rapides
    </a>
  </div>
</div>
      </div>
      <div class=\"component component-search\" id=\"header-s";
        // line 184
        echo "earch-container\">
        <div class=\"component-search-body\">
          <div class=\"component-search-top\">
            <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminSearch&amp;token=5168b59d5b4ede51fb671836118f93a2\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Rechercher (ex. : référence produit, nom du client, etc.)\" aria-label=\"Barre de recherche\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Partout
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Partout\" href=\"#\" data-value=\"0\" data-placeholder=\"Que souhaitez-vous trouver ?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Partout</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Catalogue\" href=\"#\" data-value=\"1\" data-placeholder=\"Nom du produit, référence, etc.\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Catalogue</a>
        <a class=\"dropdown-item\" data-item=\"Clients par nom\" href=\"#\" data-value=\"2\" data-placeholder=\"Nom\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Clients par nom</a>
        <a class=\"dropdown-item\" data-item=\"Clients par adresse IP\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Clients par adresse IP</a>
        <a class=\"dropdown-item\" data-item=\"Commandes\" href=\"#\" data-value=\"3\" data-placeholder=\"ID commande\" data-icon=\"icon-credit-card\"><i c";
        // line 205
        echo "lass=\"material-icons\">shopping_basket</i> Commandes</a>
        <a class=\"dropdown-item\" data-item=\"Factures\" href=\"#\" data-value=\"4\" data-placeholder=\"Numéro de facture\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Factures</a>
        <a class=\"dropdown-item\" data-item=\"Paniers\" href=\"#\" data-value=\"5\" data-placeholder=\"ID panier\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Paniers</a>
        <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Nom du module\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Modules</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">RECHERCHE</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
            <button class=\"component-search-cancel d-none\">Annuler</button>
          </div>

          <div class=\"component-search-quickaccess d-none\">
  <p class=\"component-search-title\">Accès rapide</p>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminModules&amp;&amp;configure=classy_custom_js_cs&amp;token=395234e093d038e9757b97b15a295d0d\"
             data-item=\"ClassyDevs Custom CSS and JS\"
    >ClassyDevs Custom CSS and JS</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders?token=b517329a9d1d202149bd7a32a28f95af\"
             data-item=\"Commandes\"
    >Commandes</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=15f35ac6d16567e93bdba5ce472520ea\"
             data-item=\"Évaluation du catalo";
        // line 237
        echo "gue\"
    >Évaluation du catalogue</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/modules/manage?token=b517329a9d1d202149bd7a32a28f95af\"
             data-item=\"Modules installés\"
    >Modules installés</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=31a119daaa0ac9e10c14da122da70f0a\"
             data-item=\"Nouveau bon de réduction\"
    >Nouveau bon de réduction</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/products/new?token=b517329a9d1d202149bd7a32a28f95af\"
             data-item=\"Nouveau produit\"
    >Nouveau produit</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/categories/new?token=b517329a9d1d202149bd7a32a28f95af\"
             data-item=\"Nouvelle catégorie\"
    >Nouvelle catégorie</a>
    <div class=\"dropdown-divider\"></div>
      <a id=\"quick-add-link\"
      class=\"dropdown-item js-quick-link\"
      href=\"#\"
      data-rand=\"137\"
      data-icon=\"icon-AdminThemesParent\"
      data-method=\"add\"
      data-url=\"index.php/improve/design/themes\"
      data-post-link=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminQuickAccesses&token=b7975fd313d1eab6a6f60d6ae11e8df2\"
      data-prompt-text=\"Veuillez nommer ce raccourci :\"
      data-link=\"Th&egrave;me et logo - Liste\"
    >
      <i class=\"material-icons\">add_circle</i>
      Ajouter la page actuelle à l'accès rapide
    </a>
    <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminQuickAccesses&token=b7975fd313d1eab6a6f60d6ae11e8df2\">
    <i class=\"material-icons\">settings</i>
    Gérez vos accès r";
        // line 272
        echo "apides
  </a>
</div>
        </div>

        <div class=\"component-search-background d-none\"></div>
      </div>

      
      
      <div class=\"header-right\">
                  <div class=\"component\" id=\"header-shop-list-container\">
              <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://localhost/prestashop/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      <span>Voir ma boutique</span>
    </a>
  </div>
          </div>
                          <div class=\"component header-right-component\" id=\"header-notifications-container\">
            <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Commandes<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Clients<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_";
        // line 329
        echo "message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouvelle commande pour le moment :(<br>
              Avez-vous consulté vos &lt;strong&gt;&lt;a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCarts&amp;action=filterOnlyAbandonedCarts&amp;token=7cf0d61d3fa296ca1b9a50003a867821\"&gt;paniers abandonnés&lt;/a&gt;&lt;/strong&gt; ?&lt;br&gt; Votre prochaine commande s'y trouve peut-être !
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Aucun nouveau client pour l'instant :(<br>
              Êtes-vous actifs sur les réseaux sociaux en ce moment ?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouveau message pour l'instant.<br>
              On dirait que vos clients sont satisfaits :)
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      de <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notificati";
        // line 374
        echo "on-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - enregistré le <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
          </div>
        
        <div class=\"component\" id=\"header-employee-container\">
          <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      <div class=\"employee-top\">
        <span class=\"employee-avatar\"><img class=\"avatar rounded-circle\" src=\"http://localhost/prestashop/img/pr/default.jpg\" alt=\"Djibril\" /></span>
        <span class=\"employee_profile\">Ravi de vous revoir Djibril</span>
      </div>

      <a class=\"dropdown-item employee-link profile-link\" href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/employees/1/edit?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\">
      <i class=\"material-icons\">edit</i>
      <span>Votre profil</span>
    </a>
    </div>

    <p class=\"divider\"></p>

                  <a class=\"dropdown-item \" href=\"https://accounts.distribution.prestashop.net?utm_source=localhost&utm_medium=back-office&utm_campaign=ps_accounts&utm_content=headeremployeedropdownlink\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">open_in_new</i> Gérer votre compte PrestaShop
        </a>
                  <p class=\"divider\"></p>
            
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"http://local";
        // line 415
        echo "host/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminLogin&amp;logout=1&amp;token=7b065eb9fce4b278c4ab32a9625e24e2\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Déconnexion</span>
    </a>
  </div>
</div>
        </div>
              </div>
    </nav>
  </header>

  <nav class=\"nav-bar d-none d-print-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/employees/toggle-navigation?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\">
    <i class=\"material-icons rtl-flip\">chevron_left</i>
    <i class=\"material-icons rtl-flip\">chevron_left</i>
  </span>

  <div class=\"nav-bar-overflow\">
      <div class=\"logo-container\">
          <a id=\"header_logo\" class=\"logo float-left\" href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminDashboard&amp;token=3c5fea18a087d8ebc04d5bf26cae2a7c\"></a>
          <span id=\"shop_version\" class=\"header-version\">8.0.2</span>
      </div>

      <ul class=\"main-menu\">
              
                    
                    
          
            <li class=\"link-levelone\" data-submenu=\"1\" id=\"tab-AdminDashboard\">
              <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminDashboard&amp;token=3c5fea18a087d8ebc04d5bf26cae2a7c\" class=\"link\" >
                <i class=\"material-icons\">trending_up</i> <span>Tableau de bord</span>
              </a>
            </li>

          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"2\" id=\"tab-SELL\">
                <span class=\"title\">Vendre</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
               ";
        // line 463
        echo "     <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                      <span>
                      Commandes
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders/invoices/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Factures
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"6\" id=\"subtab";
        // line 492
        echo "-AdminSlip\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders/credit-slips/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Avoirs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/orders/delivery-slips/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Bons de livraison
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCarts&amp;token=7cf0d61d3fa296ca1b9a50003a867821\" class=\"link\"> Paniers
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/products?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-store\">store</i>
                      <span>
      ";
        // line 523
        echo "                Catalogue
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/products?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/categories?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Catégories
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/monitoring/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Suivi
                                </a>
   ";
        // line 552
        echo "                           </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminAttributesGroups&amp;token=1cc0d4726349a35b0fe781d26162582b\" class=\"link\"> Attributs &amp; caractéristiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/catalog/brands/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Marques et fournisseurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/attachments/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Fichiers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"20\" id=\"subtab-AdminParentCartRule";
        // line 581
        echo "s\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCartRules&amp;token=31a119daaa0ac9e10c14da122da70f0a\" class=\"link\"> Réductions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/stocks/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Stock
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/customers/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-account_circle\">account_circle</i>
                      <span>
                      Clients
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                      
                              
  ";
        // line 613
        echo "                                                          
                              <li class=\"link-leveltwo\" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/customers/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Clients
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/addresses/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Adresses
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                    <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCustomerThreads&amp;token=1de79f51425543d330e786148c66eee5\" class=\"link\">
                      <i class=\"material-icons mi-chat\">chat</i>
                      <span>
                      SAV
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                        ";
        // line 642
        echo "    </a>
                                              <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCustomerThreads&amp;token=1de79f51425543d330e786148c66eee5\" class=\"link\"> SAV
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/sell/customer-service/order-messages/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Messages prédéfinis
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminReturn&amp;token=f13830403f9a9f49291fc70b874ee4a7\" class=\"link\"> Retours produits
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                   ";
        // line 672
        echo "   
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/metrics/legacy/stats?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-assessment\">assessment</i>
                      <span>
                      Statistiques
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-32\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"148\" id=\"subtab-AdminMetricsLegacyStatsController\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/metrics/legacy/stats?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Statistiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"149\" id=\"subtab-AdminMetricsController\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/metrics?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> PrestaShop Metrics
                                </a>
                              </li>

                                                      ";
        // line 701
        echo "                        </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title link-active\" data-submenu=\"37\" id=\"tab-IMPROVE\">
                <span class=\"title\">Personnaliser</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"38\" id=\"subtab-AdminParentModulesSf\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/mbo/modules/catalog/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Modules
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-38\" class=\"submenu panel-collapse\">
                                                                                                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"130\" id=\"subtab-AdminPsMboModuleParent\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/mbo/modules/catalog/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Marketplace
                                </a>
                              </li>

                        ";
        // line 736
        echo "                                                          
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"39\" id=\"subtab-AdminModulesSf\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/modules/manage?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Gestionnaire de modules 
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                                                          
                  <li class=\"link-levelone has_submenu link-active open ul-open\" data-submenu=\"43\" id=\"subtab-AdminParentThemes\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                      <span>
                      Apparence
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_up
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo link-active\" data-submenu=\"151\" id=\"subtab-Admi";
        // line 764
        echo "nThemesParent\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Thème et logo
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"134\" id=\"subtab-AdminPsMboTheme\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/mbo/themes/catalog/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Catalogue de thèmes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"45\" id=\"subtab-AdminParentMailTheme\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/mail_theme/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Thème d&#039;email
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"47\" id=\"subtab-AdminCmsContent\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/cms-pages/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Pages
                                </a>
                              </li>

                                                                  ";
        // line 793
        echo "                
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"48\" id=\"subtab-AdminModulesPositions\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/modules/positions/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Positions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"49\" id=\"subtab-AdminImages\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminImages&amp;token=e13d115a290165f3b2fc4810fed76111\" class=\"link\"> Images
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"117\" id=\"subtab-AdminLinkWidget\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/link-widget/list?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Liste de liens
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"50\" id=\"subtab-AdminParentShipping\">
                    <a href=\"http://localhost/";
        // line 824
        echo "prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCarriers&amp;token=c2178801ff57c10b74a3fc98541c3b71\" class=\"link\">
                      <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                      <span>
                      Livraison
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-50\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"51\" id=\"subtab-AdminCarriers\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminCarriers&amp;token=c2178801ff57c10b74a3fc98541c3b71\" class=\"link\"> Transporteurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"52\" id=\"subtab-AdminShipping\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/shipping/preferences/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo";
        // line 853
        echo "\" data-submenu=\"139\" id=\"subtab-AdminMbeShipping\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminMbeShipping&amp;token=d2280425fbba9828b0432c18f86f4cab\" class=\"link\"> Expéditions MBE
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"53\" id=\"subtab-AdminParentPayment\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/payment/payment_methods?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-payment\">payment</i>
                      <span>
                      Paiement
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"54\" id=\"subtab-AdminPayment\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/payment/payment_methods?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Modes de paiement
                                </a>
                              </li>

                                     ";
        // line 883
        echo "                                             
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"55\" id=\"subtab-AdminPaymentPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/payment/preferences?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"56\" id=\"subtab-AdminInternational\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/international/localization/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-language\">language</i>
                      <span>
                      International
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"57\" id=\"subtab-AdminParentLocalization\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/internatio";
        // line 912
        echo "nal/localization/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Localisation
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"62\" id=\"subtab-AdminParentCountries\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/international/zones/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Zones géographiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"66\" id=\"subtab-AdminParentTaxes\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/international/taxes/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Taxes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"69\" id=\"subtab-AdminTranslations\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/international/translations/settings?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Traductions
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                ";
        // line 942
        echo "              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"143\" id=\"subtab-Marketing\">
                    <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminPsxMktgWithGoogleModule&amp;token=41726d4905a060a6dfd83917616ec8ad\" class=\"link\">
                      <i class=\"material-icons mi-campaign\">campaign</i>
                      <span>
                      Marketing
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-143\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"144\" id=\"subtab-AdminPsxMktgWithGoogleModule\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminPsxMktgWithGoogleModule&amp;token=41726d4905a060a6dfd83917616ec8ad\" class=\"link\"> Google
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"146\" id=\"subtab-AdminPsfacebookModule\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminPsfacebookModule&amp;token=0e9009fa2d18bd247203223c12dc5b29\" class=\"link\"> Facebook
        ";
        // line 970
        echo "                        </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"70\" id=\"tab-CONFIGURE\">
                <span class=\"title\">Configurer</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"71\" id=\"subtab-ShopParameters\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/preferences/preferences?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-settings\">settings</i>
                      <span>
                      Paramètres de la boutique
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-71\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"72\" id=\"subtab-AdminParentPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/preferences/preferences?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Paramètres généraux
                                </a>
                     ";
        // line 1006
        echo "         </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"75\" id=\"subtab-AdminParentOrderPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/order-preferences/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"78\" id=\"subtab-AdminPPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/product-preferences/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"79\" id=\"subtab-AdminParentCustomerPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/customer-preferences/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Clients
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"83\" id=\"subtab-AdminParentStores\">
                       ";
        // line 1036
        echo "         <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/contacts/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Contact
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"86\" id=\"subtab-AdminParentMeta\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/shop/seo-urls/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Trafic et SEO
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"89\" id=\"subtab-AdminParentSearchConf\">
                                <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminSearchConf&amp;token=31c8b2404c56f03ce1ab3f55ff2a530b\" class=\"link\"> Rechercher
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"92\" id=\"subtab-AdminAdvancedParameters\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/system-information/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\">
                      <i class=\"material-icons mi-settings_applications\">settings_applications</i";
        // line 1064
        echo ">
                      <span>
                      Paramètres avancés
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-92\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"93\" id=\"subtab-AdminInformation\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/system-information/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Informations
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"94\" id=\"subtab-AdminPerformance\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/performance/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Performances
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"95\" id=\"subtab-AdminAdminPreferences\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/administration/?_token=G0mv";
        // line 1093
        echo "f0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Administration
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"96\" id=\"subtab-AdminEmails\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/emails/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> E-mail
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"97\" id=\"subtab-AdminImport\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/import/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Importer
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"98\" id=\"subtab-AdminParentEmployees\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/employees/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Équipe
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" da";
        // line 1124
        echo "ta-submenu=\"102\" id=\"subtab-AdminParentRequestSql\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/sql-requests/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Base de données
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"105\" id=\"subtab-AdminLogs\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/logs/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Logs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"106\" id=\"subtab-AdminWebservice\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/webservice-keys/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Webservice
                                </a>
                              </li>

                                                                                                                                                                                              
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"109\" id=\"subtab-AdminFeatureFlag\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/feature-flags/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Fonctionn";
        // line 1149
        echo "alités nouvelles et expérimentales
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"110\" id=\"subtab-AdminParentSecurity\">
                                <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/configure/advanced/security/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" class=\"link\"> Sécurité
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                  </ul>
  </div>
  
</nav>


<div class=\"header-toolbar d-print-none\">
    
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Thème et logo</li>
          
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Thème et logo &gt; Thème          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                          <a
                  class=\"btn btn-primary pointer\"                  id=\"page-header-desc-configuration-add\"
                  href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/import?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"                  title=\"Ajouter un thème\"                >
                  <i class=\"material-icons\">add</i>                  Ajouter un thème
                </a>
                                                                        <a
                  class=\"btn btn-primary pointer\"                  ";
        // line 1200
        echo "id=\"page-header-desc-configuration-export\"
                  href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/export?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"                  title=\"Exporter le thème actif\"                >
                  <i class=\"material-icons\">cloud_download</i>                  Exporter le thème actif
                </a>
                                      
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Aide\"
                   data-toggle=\"sidebar\"
                   data-target=\"#right-sidebar\"
                   data-url=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop-project.org%252Ffr%252Fdoc%252FAdminThemes%253Fversion%253D8.0.2%2526country%253Dfr/Aide?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"
                   id=\"product_form_open_help\"
                >
                  Aide
                </a>
                                    </div>
        </div>

      
    </div>
  </div>

  
      <div class=\"page-head-tabs\" id=\"head_tabs\">
      <ul class=\"nav nav-pills\">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ";
        // line 1225
        echo "<li class=\"nav-item\">
                    <a href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" id=\"subtab-AdminThemes\" class=\"nav-link tab active current\" data-submenu=\"44\">
                      Thème et logo
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                <li class=\"nav-item\">
                    <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminPsThemeCustoConfiguration&token=53aa9300ebb451469733e7c29fd267f7\" id=\"subtab-AdminPsThemeCustoConfiguration\" class=\"nav-link tab \" data-submenu=\"152\">
                      Pages Configuration
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                <li class=\"nav-item\">
                    <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminPsThemeCustoAdvanced&token=a4d0a5273170a53e89760d2334128133\" id=\"subtab-AdminPsThemeCustoAdvanced\" class=\"nav-link tab \" data-submenu=\"153\">
                      Personnalisation avancée
                      <span class=\"notification-container\">
                        <span class=\"notification-counter\"></span>
                      </span>
                    </a>
                  </li>
                                                                                                                                                                                                                                                                                                                                   ";
        // line 1249
        echo "                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </ul>
    </div>
  
  <div class=\"btn-floating\">
    <button class=\"btn btn-primary collapsed\" data-toggle=\"collapse\" data-target=\".btn-floating-container\" aria-expanded=\"false\">
      <i class=\"material-icons\">add</i>
    </button>
    <div class=\"btn-floating-container collapse\">
      <div class=\"btn-floating-menu\">
        
                              <a
              class=\"btn btn-floating-item   pointer\"              id=\"page-header-desc-floating-configuration-add\"
              href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/import?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"              title=\"Ajouter un thème\"            >
              Ajouter un thème
              <i class=\"material-icons\">add</i>            </a>
                                        <a
              class=\"btn btn-floating-item   pointer\"              id=\"page-header-desc-floating-configuration-export\"
              href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/improve/design/themes/export?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"              title=\"Exporter le thème actif\"            >
              Exporter le thème actif
              <i class=\"material-icons\">cloud_download</i>            </a>
                  
                              <a class";
        // line 1270
        echo "=\"btn btn-floating-item btn-help btn-sidebar\" href=\"#\"
               title=\"Aide\"
               data-toggle=\"sidebar\"
               data-target=\"#right-sidebar\"
               data-url=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop-project.org%252Ffr%252Fdoc%252FAdminThemes%253Fversion%253D8.0.2%2526country%253Dfr/Aide?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"
            >
              Aide
            </a>
                        </div>
    </div>
  </div>
  
</div>

<div id=\"main-div\">
          
      <div class=\"content-div  with-tabs\">

        

                                                        
        <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>
<div id=\"content-message-box\"></div>


  ";
        // line 1295
        $this->displayBlock('content_header', $context, $blocks);
        $this->displayBlock('content', $context, $blocks);
        $this->displayBlock('content_footer', $context, $blocks);
        $this->displayBlock('sidebar_right', $context, $blocks);
        echo "

        

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh non !</h1>
  <p class=\"mt-3\">
    La version mobile de cette page n'est pas encore disponible.
  </p>
  <p class=\"mt-2\">
    Cette page n'est pas encore disponible sur mobile, merci de la consulter sur ordinateur.
  </p>
  <p class=\"mt-2\">
    Merci.
  </p>
  <a href=\"http://localhost/prestashop/admin413hpr1nsxpruffkv5y/index.php?controller=AdminDashboard&amp;token=3c5fea18a087d8ebc04d5bf26cae2a7c\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons rtl-flip\">arrow_back</i>
    Précédent
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    <div id=\"module-modal-addons-connect\" class=\"modal  modal-vcenter fade\" role=\"dialog\" tabindex=\"-1\" aria-labelledby=\"module-modal-title\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h4 class=\"modal-title module-modal-title\">Se connecter à la marketplace Addons</h4>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
      </div>
      <div class=\"modal-body\">
                  <div class=\"row\">
              <div class=\"col-md-12\">
                  <p>
                      Liez votre boutique à votre compte Addons pour recevoir automatiquement les mises à jour importantes des modules que vous avez achetés. Vous n&#039;avez pas encore de compte ?
                      <a href=\"https://accounts.distribution.prestashop.net/fr/sign-up?_ga=2.183749797.2029715227.1645605306-2047387021.1643627469&amp;_gac=1.81371877.1644238612.CjwKCAiAo4OQBhBBEiwA5KWu_5UzrywbBPo4PKIYESy7K-noavdo7Z4riOZMJEoM9mE1IE3gks0thxoCZOwQAvD_BwE\" target=\"_blank\">Inscrivez-vous maintenant</a>
                  </p>
                  <p>
                      Si vous avez créé votre compte avec Google, veuillez suivre la procédure de mot de passe oublié de Addons Marketpla";
        // line 1337
        echo "ce pour créer votre mot de passe : 
                      <a href=\"https://auth.prestashop.com/fr/mot-de-passe/demande-de-reinitialisation\" target=\"_blank\">Réinitialiser votre mot de passe</a>
                  </p>
                  <form id=\"addons-connect-form\"
                        action=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/mbo/addons/login?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\"
                        method=\"POST\"
                        data-error-message=\"An error occurred while processing your request.\"
                  >
                  <div class=\"form-group\">
                    <label for=\"module-addons-connect-email\">Adresse e-mail</label>
                    <input name=\"username_addons\" type=\"email\" class=\"form-control\" id=\"module-addons-connect-email\" placeholder=\"Email\">
                  </div>
                  <div class=\"form-group\">
                    <label for=\"module-addons-connect-password\">Mot de passe</label>
                    <input name=\"password_addons\" type=\"password\" class=\"form-control\" id=\"module-addons-connect-password\" placeholder=\"Password\">
                  </div>
                  <div class=\"md-checkbox md-checkbox-inline\">
                    <label>
                      <input type=\"checkbox\" name=\"addons_remember_me\">
                      <i class=\"md-checkbox-control\"></i>
                        Se souvenir de moi
                    </label>
                  </div>
                  <div class=\"text-center\">
                      <button type=\"submit\" class=\"btn btn-primary\">C&#039;est parti !</button>
                    <div id=\"addons_login_btn\" class=\"spinner\" style=\"display:none;\"></div>
                  </div>
                </form>
                <p class=\"text-center py-3\">
                    <a href=\"https://auth.prestashop.com/fr/mot-de-passe/demande-de-reinitialisation\" target=\"_blank\">Mot de passe oublié ?</a>
                </p>
              </div>
    ";
        // line 1369
        echo "      </div>
              </div>
    </div>
  </div>
</div>
<div id=\"module-modal-addons-logout\" class=\"modal  modal-vcenter fade\" role=\"dialog\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h4 class=\"modal-title module-modal-title\">Confirmer la déconnexion</h4>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
      </div>
      <div class=\"modal-body\">
          <div class=\"row\">
              <div class=\"col-md-12\">
                  <p>
                    Vous êtes sur le point de vous déconnecter de votre compte Addons. Vous pourriez rater d&#039;importantes mises à jour pour les modules que vous avez achetés.
                  </p>
              </div>
          </div>
      </div>
      <div class=\"modal-footer\">
          <input type=\"button\" class=\"btn btn-default uppercase\" data-dismiss=\"modal\" value=\"Annuler\">
          <a class=\"btn btn-primary uppercase\" href=\"/prestashop/admin413hpr1nsxpruffkv5y/index.php/modules/mbo/addons/logout?_token=G0mvf0SXtR0zPf0eafvnMTzJ1o0FFSTC5ETyLBGFxkY\" id=\"module-modal-addons-logout-ack\">Oui, me déconnecter</a>
      </div>

        </div>
    </div>
</div>

</div>
  

      <div class=\"bootstrap\">
      
    </div>
  
";
        // line 1407
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>";
        echo "
</html>";
    }

    // line 113
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1295
    public function block_content_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_sidebar_right($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1407
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "__string_template__dff128fe93df51a016b377f23bb0b854a59dc2fb6475e3c9a164efb0910e150e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1588 => 1407,  1567 => 1295,  1556 => 113,  1547 => 1407,  1507 => 1369,  1473 => 1337,  1425 => 1295,  1398 => 1270,  1375 => 1249,  1349 => 1225,  1322 => 1200,  1269 => 1149,  1242 => 1124,  1209 => 1093,  1178 => 1064,  1148 => 1036,  1116 => 1006,  1078 => 970,  1048 => 942,  1016 => 912,  985 => 883,  953 => 853,  922 => 824,  889 => 793,  858 => 764,  828 => 736,  791 => 701,  760 => 672,  728 => 642,  697 => 613,  663 => 581,  632 => 552,  601 => 523,  568 => 492,  537 => 463,  487 => 415,  444 => 374,  397 => 329,  338 => 272,  301 => 237,  267 => 205,  244 => 184,  205 => 147,  166 => 113,  140 => 89,  120 => 71,  89 => 42,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__dff128fe93df51a016b377f23bb0b854a59dc2fb6475e3c9a164efb0910e150e", "");
    }
}
