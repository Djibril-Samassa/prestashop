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
class StripeIdempotencyKey extends ObjectModel
{
    /** @var int */
    public $id_cart;
    /** @var string */
    public $idempotency_key;
    /** @var string */
    public $id_payment_intent;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'stripe_idempotency_key',
        'primary' => 'id_idempotency_key',
        'fields' => [
            'id_cart' => [
                'type' => ObjectModel::TYPE_INT,
                'validate' => 'isInt',
                'size' => 10,
            ],
            'idempotency_key' => [
                'type' => ObjectModel::TYPE_STRING,
                'validate' => 'isString',
                'size' => 255,
            ],
            'id_payment_intent' => [
                'type' => ObjectModel::TYPE_STRING,
                'validate' => 'isString',
                'size' => 255,
            ],
        ],
    ];

    public function setIdCart($id_cart)
    {
        $this->id_cart = $id_cart;
    }

    public function getIdCart()
    {
        return $this->id_cart;
    }

    public function setIdempotencyKey($idempotency_key)
    {
        $this->idempotency_key = $idempotency_key;
    }

    public function getIdempotencyKey()
    {
        return $this->idempotency_key;
    }

    public function setIdPaymentIntent($id_payment_intent)
    {
        $this->id_payment_intent = $id_payment_intent;
    }

    public function getIdPaymentIntent()
    {
        return $this->id_payment_intent;
    }

    public function getByIdCart($id_cart)
    {
        $query = new DbQuery();
        $query->select('*');
        $query->from(static::$definition['table']);
        $query->where('id_cart = ' . pSQL((int) $id_cart));

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query->build());
        if (false == $result) {
            return $this;
        }

        $this->hydrate($result);

        return $this;
    }

    public function getByIdPaymentIntent($id_payment_intent)
    {
        $query = new DbQuery();
        $query->select('*');
        $query->from(static::$definition['table']);
        $query->where('id_payment_intent = "' . pSQL($id_payment_intent) . '"');

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query->build());
        if (false == $result) {
            return $this;
        }

        $this->hydrate($result);

        return $this;
    }

    /**
     * @throws PrestaShopException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function createNewOne($id_cart, $datasIntent)
    {
        $idempotency_key = $id_cart . '_' . uniqid();

        $intent = \Stripe\PaymentIntent::create(
            $datasIntent,
            [
              'idempotency_key' => $idempotency_key,
            ]
        );

        $this->id_cart = $id_cart;
        $this->idempotency_key = $idempotency_key;
        $this->createForCheckoutIntent($intent);

        return $intent;
    }

    /**
     * @throws PrestaShopException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function createForCheckout($cartId, $sessionId)
    {
        $idempotency_key = $cartId . '_' . uniqid();

        $this->id_cart = $cartId;
        $this->idempotency_key = $idempotency_key;
        $this->id_payment_intent = $sessionId;
        $this->save();

        return $this;
    }

    /**
     * @throws PrestaShopException
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function createForCheckoutIntent($intent)
    {
        $this->id_payment_intent = $intent->id;
        $this->save();

        $paymentIntent = new StripePaymentIntent();
        $paymentIntent->setIdPaymentIntent($intent->id);
        $paymentIntent->setStatus($intent->status);
        $paymentIntent->setAmount($intent->amount);
        $paymentIntent->setCurrency($intent->currency);
        $paymentIntent->setDateAdd(date('Y-m-d H:i:s', $intent->created));
        $paymentIntent->setDateUpd(date('Y-m-d H:i:s', $intent->created));
        $paymentIntent->save(false, false);

        return $intent;
    }

    /**
     * @throws \Stripe\Exception\ApiErrorException
     * @throws PrestaShopException
     */
    public function updateIntentData($intentData)
    {
        unset($intentData['automatic_payment_methods']);
        $intent = \Stripe\PaymentIntent::update($this->id_payment_intent, $intentData);

        $paymentIntent = new StripePaymentIntent();
        $paymentIntent->findByIdPaymentIntent($this->id_payment_intent);
        $paymentIntent->setStatus($intent->status);
        $paymentIntent->setAmount($intent->amount);
        $paymentIntent->setCurrency($intent->currency);
        $paymentIntent->setDateUpd(date('Y-m-d H:i:s'));
        $paymentIntent->save(false, false);

        return $intent;
    }
}
