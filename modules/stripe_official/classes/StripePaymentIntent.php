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
class StripePaymentIntent extends ObjectModel
{
    /** @var string */
    public $id_payment_intent;
    /** @var string */
    public $status;
    /** @var float */
    public $amount;
    /** @var string */
    public $currency;
    /** @var date */
    public $date_add;
    /** @var date */
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'stripe_payment_intent',
        'primary' => 'id_stripe_payment_intent',
        'fields' => [
            'id_payment_intent' => [
                'type' => ObjectModel::TYPE_STRING,
                'validate' => 'isString',
                'size' => 40,
            ],
            'status' => [
                'type' => ObjectModel::TYPE_STRING,
                'validate' => 'isString',
                'size' => 30,
            ],
            'amount' => [
                'type' => ObjectModel::TYPE_FLOAT,
                'validate' => 'isFloat',
                'size' => 10,
                'scale' => 2,
            ],
            'currency' => [
                'type' => ObjectModel::TYPE_STRING,
                'validate' => 'isString',
                'size' => 3,
            ],
            'date_add' => [
                'type' => ObjectModel::TYPE_DATE,
                'validate' => 'isDate',
            ],
            'date_upd' => [
                'type' => ObjectModel::TYPE_DATE,
                'validate' => 'isDate',
            ],
        ],
    ];

    public function setIdPaymentIntent($id_payment_intent)
    {
        $this->id_payment_intent = $id_payment_intent;
    }

    public function getIdPaymentIntent()
    {
        return $this->id_payment_intent;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setAmount($amount)
    {
        $module = Module::getInstanceByName('stripe_official');
        $amount = $module->isZeroDecimalCurrency(Tools::strtoupper($this->currency)) ? $amount : $amount / 100;

        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function setDateUpd($date_upd)
    {
        $this->date_upd = $date_upd;
    }

    public function getDateUpd()
    {
        return $this->date_upd;
    }

    public function findByIdPaymentIntent($idPaymentIntent)
    {
        $query = new DbQuery();
        $query->select('*');
        $query->from(self::$definition['table']);
        $query->where('id_payment_intent = "' . pSQL($idPaymentIntent) . '"');

        $data = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($query->build());
        if (!$data) {
            return false;
        }
        $this->hydrate($data);

        return $this;
    }
}
