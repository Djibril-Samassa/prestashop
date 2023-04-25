<?php
/**
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
 */

namespace StripeOfficial\Controllers\Traits;

trait GeneralTrait
{
    public function getShippingDetails($shippingAddress, $shippingAddressState, $country, $customer)
    {
        $customerFullName = $this->getCustomerFullNameContext($customer);

        return [
            'name' => $customerFullName,
            'address' => [
                'line1' => $shippingAddress->address1,
                'line2' => $shippingAddress->address2,
                'postal_code' => $shippingAddress->postcode,
                'city' => $shippingAddress->city,
                'state' => $shippingAddressState->iso_code,
                'country' => $country,
            ],
        ];
    }

    protected function getPaymentMethodOptions($captureMethod)
    {
        return [
            'link' => [
                'capture_method' => $captureMethod,
            ],
            'card' => [
                'capture_method' => $captureMethod,
            ],
            'klarna' => [
                'capture_method' => $captureMethod,
            ],
            'afterpay_clearpay' => [
                'capture_method' => $captureMethod,
            ],
            'affirm' => [
                'capture_method' => $captureMethod,
            ],
            'wechat_pay' => [
                'client' => 'web',
            ],
        ];
    }

    protected function createBillingDetails($addressDetails, $shippingAddressState, $customer, $country)
    {
        return [
            'billing_details' => [
                'address' => [
                    'city' => $addressDetails->city,
                    'country' => $country,
                    'line1' => $addressDetails->address1,
                    'line2' => $addressDetails->address2,
                    'postal_code' => $addressDetails->postcode,
                    'state' => $shippingAddressState->iso_code,
                ],
                'email' => $customer->email,
                'name' => $this->getCustomerFullNameContext($customer),
                'phone' => $addressDetails->phone,
            ],
        ];
    }

    protected function getCustomerDetails($customer, $intent)
    {
        $stripeAccount = \Stripe\Account::retrieve();
        $stripeCustomer = new \StripeCustomer();
        $stripeCustomer = $stripeCustomer->getCustomerById($customer->id, $stripeAccount->id);

        if ((true === empty($stripeCustomer->id_customer) || null == $stripeCustomer->id_customer) && 0 == $customer->is_guest) {
            $customerData = \Stripe\Customer::create([
                'description' => 'Customer created from Prestashop Stripe module',
                'email' => $customer->email,
                'name' => $customer->firstname . ' ' . $customer->lastname,
                'address' => [
                    'city' => $intent['shipping']['address']['city'],
                    'country' => $intent['shipping']['address']['country'],
                    'line1' => $intent['shipping']['address']['line1'],
                    'postal_code' => $intent['shipping']['address']['postal_code'],
                    'state' => $intent['shipping']['address']['state'],
                ],
            ]);

            $stripeCustomer->id_customer = $customer->id;
            $stripeCustomer->stripe_customer_key = $customerData->id;
            $stripeCustomer->id_account = $stripeAccount->id;
            $stripeCustomer->save();
        }

        return $stripeCustomer->stripe_customer_key;
    }

    protected function getCustomerFullNameContext($customer)
    {
        $firstname = str_replace('"', '\\"', $customer->firstname);
        $lastname = str_replace('"', '\\"', $customer->lastname);

        return $firstname . ' ' . $lastname;
    }
}
