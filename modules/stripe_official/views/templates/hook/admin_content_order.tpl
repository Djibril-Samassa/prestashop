{**
 * Copyright (c) since 2010 Stripe, Inc. (https://stripe.com)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    Stripe <https://support.stripe.com/contact/email>
 * @copyright Since 2010 Stripe, Inc.
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}

<div class="tab-pane" id="StripePayment">
  <p>
    <span><strong>{l s='Payment ID' mod='stripe_official'}</strong></span><br/>
    <span><a href="{$stripe_dashboardUrl.charge|escape:'htmlall':'UTF-8'}"
             target="blank">{$stripe_charge|escape:'htmlall':'UTF-8'}</a></span>
  </p>
  <p>
    <span><strong>{l s='Payment date' mod='stripe_official'}</strong></span><br/>
    <span>{$stripe_date|escape:'htmlall':'UTF-8'}</span>
  </p>
  <p>
    <span><strong>{l s='Payment method' mod='stripe_official'}</strong></span><br/>
    <span><img
        src="{$module_dir|escape:'htmlall':'UTF-8'}/views/img/cc-{$stripe_paymentType|escape:'htmlall':'UTF-8'}.png"
        alt="payment method" style="width:43px;"/></span>
  </p>

    {if isset($stripe_dateCatch) && $stripe_dateCatch != '0000-00-00 00:00:00'}
      <p>
        <span><strong>{l s='Authorize date' mod='stripe_official'}</strong></span><br/>
        <span>{$stripe_dateCatch|escape:'htmlall':'UTF-8'}</span>
      </p>
    {/if}

    {if (isset($stripe_dateAuthorize) && $stripe_dateAuthorize != '0000-00-00 00:00:00') || (isset($stripe_expired) && $stripe_expired == 1)}
      <p>
        <span><strong>{l s='Capture date' mod='stripe_official'}</strong></span><br/>
          {if $stripe_dateAuthorize != '0000-00-00 00:00:00'}
            <span>{$stripe_dateAuthorize|escape:'htmlall':'UTF-8'}</span>
          {else}
            <span>{l s='Expired' mod='stripe_official'}</span>
          {/if}
      </p>
    {/if}

  <p>
    <span><strong>{l s='Payment dispute' mod='stripe_official'}</strong></span><br/>
      {if $stripe_dispute === true}
        <span><a href="{$stripe_dashboardUrl.charge|escape:'htmlall':'UTF-8'}"
                 target="blank">{l s='check your dispute here' mod='stripe_official'}</a></span>
      {else}
        <span>{l s='No dispute' mod='stripe_official'}</span>
      {/if}
  </p>

    {if (isset($stripe_paymentType) && $stripe_paymentType == 'oxxo')}
      <p>
        <span><strong>{l s='Voucher Validation' mod='stripe_official'}</strong></span><br/>
          {if $stripe_voucher_validate != '0000-00-00'}
            <span>{l s='Voucher validate on :' mod='stripe_official'} {$stripe_voucher_validate|escape:'htmlall':'UTF-8'}</span>
          {else}
            <span>{l s='Voucher will expire on :' mod='stripe_official'} {$stripe_voucher_expire|escape:'htmlall':'UTF-8'}</span>
          {/if}
      </p>
    {/if}
    {if (isset($stripe_paymentMethod) && $stripe_paymentMethod == 'card')}
      <p>
        <span><strong>{l s='Stripe Customer ID' mod='stripe_official'}</strong></span><br/>
        <span>{$stripe_customerID|escape:'htmlall':'UTF-8'}</span>
      </p>
      <p>
        <span><strong>{l s='Risk evaluation' mod='stripe_official'}</strong></span><br/>
        <span><strong>{l s='Score :' mod='stripe_official'}</strong> {$stripe_riskScore|escape:'htmlall':'UTF-8'}</span>
        <br/>
        <span><strong>{l s='Level :' mod='stripe_official'}</strong> {$stripe_riskLevel|escape:'htmlall':'UTF-8'}</span>
      </p>
    {/if}
</div>
