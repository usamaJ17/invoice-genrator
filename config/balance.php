<?php
/**
 * Configuration for balance manager.
 * This file returns an 'array factory' compatible definition for {@link \Illuminatech\Balance\BalanceDb} object.
 *
 * @see \Illuminatech\Balance\BalanceDb
 * @see \Illuminatech\ArrayFactory\FactoryContract
 */

return [
    '__class' => Illuminatech\Balance\BalanceDb::class,
    'accountTable' => 'balance_accounts',
    'transactionTable' => 'balance_transactions',
    'extraAccountLinkAttribute' => 'extra_account_id',
    'dataAttribute' => 'data',
    'accountBalanceAttribute'  => 'balance'
];
