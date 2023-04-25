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

<form id="configuration_form" class="defaultForm form-horizontal stripe_official" action="#stripe_step_1" method="post" enctype="multipart/form-data" novalidate="">
  <input type="hidden" name="submit_login" value="1">
  <input type="hidden" name="order_status_select" value="{$orderStatusSelected|escape:'htmlall':'UTF-8'}">
  <div class="panel" id="fieldset_0">
    <div class="form-wrapper">
      <div class="form-group stripe-connection">
          {assign var='stripe_url' value='https://partners-subscribe.prestashop.com/stripe/connect.php?params[return_url]='}
          {{l s='[a @href1@]Create your Stripe account in 10 minutes[/a] and immediately start accepting card payments as well as local payment methods (no additional contract/merchant ID needed from your bank).' mod='stripe_official'}|stripelreplace:['@href1@' => {{$stripe_url|cat:$return_url|escape:'htmlall':'UTF-8'}}, '@target@' => {'target="blank"'}]}<br>

        <div class="connect_btn">
          <a href="https://partners-subscribe.prestashop.com/stripe/connect.php?params[return_url]={$return_url|escape:'htmlall':'UTF-8'}" class="stripe-connect">
            <span>{l s='Connect with Stripe' mod='stripe_official'}</span>
          </a>
        </div>
      </div>
      <hr/>
      <div class="form-group">
        <label class="control-label col-lg-3">{l s='Mode' mod='stripe_official'}</label>
        <div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="STRIPE_MODE" id="STRIPE_MODE_ON" value="1" {if $stripe_mode == 1}checked="checked"{/if}>
						<label for="STRIPE_MODE_ON">{l s='test' mod='stripe_official'}</label>
						<input type="radio" name="STRIPE_MODE" id="STRIPE_MODE_OFF" value="0" {if $stripe_mode == 0}checked="checked"{/if}>
						<label for="STRIPE_MODE_OFF">{l s='live' mod='stripe_official'}</label>
						<a class="slide-button btn"></a>
					</span>
          <p class="help-block"></p>
        </div>
        <span>
					{{l s='You can find your API keys in the Developers section of your Stripe [a @href1@]dashboard[/a].' mod='stripe_official'}|stripelreplace:['@href1@' => {'https://dashboard.stripe.com/account/apikeys'}, '@target@' => {'target="blank"'}]}
				</span>
      </div>

      <div class="form-group" {if $stripe_mode == 1}style="display: none;"{/if}>
        <label class="control-label col-lg-3 required">{l s='Publishable key (live mode)' mod='stripe_official'}</label>
        <div class="col-lg-9">
          <input type="text" name="STRIPE_PUBLISHABLE" id="public_key" value="{$stripe_publishable|escape:'htmlall':'UTF-8'}" class="fixed-width-xxl" size="20" required="required">
        </div>
      </div>
      <div class="form-group" {if $stripe_mode == 1}style="display: none;"{/if}>
        <label class="control-label col-lg-3 required">{l s='Secret key (live mode)' mod='stripe_official'}</label>
        <div class="col-lg-9">
          <input type="password" name="STRIPE_KEY" id="secret_key" value="{$stripe_key|escape:'htmlall':'UTF-8'}" class="fixed-width-xxl" size="20" required="required">
        </div>
      </div>
      <div class="form-group"{if $stripe_mode == 0}style="display: none;"{/if}>
        <label class="control-label col-lg-3 required">{l s='Publishable key (test mode)' mod='stripe_official'}</label>
        <div class="col-lg-9">
          <input type="text" name="STRIPE_TEST_PUBLISHABLE" id="test_public_key" value="{$stripe_test_publishable|escape:'htmlall':'UTF-8'}" class="fixed-width-xxl" size="20" required="required">
        </div>
      </div>
      <div class="form-group"{if $stripe_mode == 0}style="display: none;"{/if}>
        <label class="control-label col-lg-3 required">{l s='Secret key (test mode)' mod='stripe_official'}</label>
        <div class="col-lg-9">
          <input type="password" name="STRIPE_TEST_KEY" id="test_secret_key" value="{$stripe_test_key|escape:'htmlall':'UTF-8'}" class="fixed-width-xxl" size="20" required="required">
        </div>
      </div>

      <div id="conf-payment-methods">
        <p><b>{l s='Testing Stripe' mod='stripe_official'}</b></p>
        <ul>
          <li>{l s='Toggle the button above to Test Mode.' mod='stripe_official'}</li>
          <li>
              {{l s='You\'ll find test card numbers in our [a @href1@]documentation[/a].' mod='stripe_official'}|stripelreplace:['@href1@' => {'http://www.stripe.com/docs/testing'}, '@target@' => {'target="blank"'}]}
          </li>
          <li>{l s='In test mode, real cards are not accepted.' mod='stripe_official'}</li>
        </ul>
        <p><b>{l s='Going live with Stripe' mod='stripe_official'}</b></p>
        <ul>
          <li>{l s='Toggle the button above to Live Mode.' mod='stripe_official'}</li>
          <li>{l s='In live mode, tests are no longer allowed.' mod='stripe_official'}</li>
        </ul>
        <p><b>{l s='Getting support' mod='stripe_official'}</b></p>
        <ul>
          <li>{{l s='If you have any questions, please check out [a @href1@]our FAQs[/a] first.' mod='stripe_official'}|stripelreplace:['@href1@' => {'https://support.stripe.com/questions/prestashop'}, '@target@' => {'target="blank"'}] nofilter}</li>
          <li>{{l s='For questions regarding the module itself, feel free to [a @href1@]reach out to the developers[/a].' mod='stripe_official'}|stripelreplace:['@href1@' => {'https://addons.prestashop.com/en/contact-us?id_product=24922'}, '@target@' => {'target="blank"'}] nofilter}</li>
          <li>{{l s='For questions regarding your Stripe account, contact the [a @href1@]Stripe support[/a].' mod='stripe_official'}|stripelreplace:['@href1@' => {'https://support.stripe.com/contact'}, '@target@' => {'target="blank"'}] nofilter}</li>
        </ul>

        <br>
        <div class="form-group">
          <b>{l s='Payment form settings*' mod='stripe_official'}</b>
          <div class="left20">
            <input type="radio" id="element" name="payment_element" value='1' class="child" {if $payment_element || $payment_element == ''}checked{/if}>
            <label for="element">
                {l s='Integrated payment form' mod='stripe_official'}
            </label>
            <br>
            <input type="radio" id="checkout" name="payment_element" value='0' class="child" {if $payment_element == '0' && $payment_element != '' &&  $payment_element != NULL}checked{/if}>
            <label for="checkout">
                {l s='Redirect to Stripe' mod='stripe_official'}
            </label>
            <p>
                {{l s='*Additional payment methods besides cards can be activated in your [a @href1@]Stripe Dashboard[/a].' mod='stripe_official'}|stripelreplace:['@href1@' => {'https://dashboard.stripe.com/dashboard'}, '@target@' => {'target="blank"'}]}
            </p>
            <div id="theme">
              <label>{l s='Select a theme for the integrated payment form' mod='stripe_official'}</label>
              <select name="stripe_theme" id="theme">
                <option value="stripe" {if $stripe_theme == 'stripe'}selected{/if}>Stripe</option>
                <option value="flat" {if $stripe_theme == 'flat'}selected{/if}>Flat</option>
                <option value="night" {if $stripe_theme == 'night'}selected{/if}>Night</option>
                <option value="none" {if $stripe_theme == 'none'}selected{/if}>None</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="checkbox" id="postcode" name="postcode" {if $postcode}checked="checked"{/if}/>
          <label for="postcode">{l s='Never collect the postal code (not recommended)*.' mod='stripe_official'}</label><br/>
          <span class="left20">*{l s='This information improves the acceptance rates for cards issued in the United States, the United Kingdom and Canada.' mod='stripe_official'}</span>
        </div>

        <div class="form-group">
          <input type="checkbox" id="catchandauthorize" name="catchandauthorize" {if $catchandauthorize}checked="checked"{/if}/>
          <label for="catchandauthorize">{l s='Enable separate authorization and capture. If enabled, Stripe will place a hold on the card for the amount of the order during checkout. That authorization will be captured and the money settled to your account when the order transitions to the status of your choice.' mod='stripe_official'}</label>
          <p class="left20">
            <b>{l s='Warning: you have 7 calendar days to capture the authorization before it expires and the hold on the card is released.' mod='stripe_official'}</b>
          </p>
          <span class="left20">{l s='Capture the payment when transitioning to the following order statuses.' mod='stripe_official'}</span>
          <div id="status_restrictions" class="left20">
            <br />
            <table class="table">
              <tr>
                <td class="col-md-6">
                  <p>{l s='Your status' mod='stripe_official'}</p>
                  <select id="order_status_select_1" class="input-large child" multiple {if $catchandauthorize == false}disabled{/if}>
                      {foreach from=$orderStatus.unselected item='orderState'}
                        <option value="{$orderState.id_order_state|intval}">{$orderState.name|escape}</option>
                      {/foreach}
                  </select>
                  <a id="order_status_select_add" class="btn btn-default btn-block clearfix" >{l s='Add' mod='stripe_official'} <i class="icon-arrow-right"></i></a>
                </td>
                <td class="col-md-6">
                  <p>{l s='Catch status' mod='stripe_official'}</p>
                  <select id="order_status_select_2" class="input-large child" multiple {if $catchandauthorize == false}disabled{/if}>
                      {foreach from=$orderStatus.selected item='orderState'}
                        <option value="{$orderState.id_order_state|intval}">{$orderState.name|escape}</option>
                      {/foreach}
                  </select>
                  <a id="order_status_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> {l s='Remove' mod='stripe_official'} </a>
                </td>
              </tr>
            </table>
          </div>

          <div class="left20">
            <p>{l s='Transition to the following order status if the authorization expires before being captured.' mod='stripe_official'}</p>
            <select name="capture_expired" id="capture_expired" class="child" {if $catchandauthorize == false}disabled{/if}>
              <option value="0">{l s='Select a status' mod='stripe_official'}</option>
                {foreach from=$allOrderStatus item=status}
                  <option value="{$status.id_order_state|intval}" {if isset($captureExpire) && $captureExpire == $status.id_order_state}selected="selected"{/if}>{$status.name|escape}</option>
                {/foreach}
            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="panel-footer">
      <button type="submit" value="1" id="configuration_form_submit_btn" name="submit_login" class="btn btn-default pull-right button">
        <i class="process-icon-save"></i>
          {l s='Save' mod='stripe_official'}
      </button>
    </div>
  </div>
</form>
