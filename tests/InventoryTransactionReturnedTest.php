<?php

use Stevebauman\Inventory\Models\InventoryTransaction;

class InventoryTransactionReturnedTest extends InventoryTransactionTest
{
    public function testInventoryTransactionReturnedAfterSold()
    {
        $transaction = $this->newTransaction();

        $transaction->sold(5)->returned();

        $this->assertEquals(0, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_RETURNED, $transaction->state);
    }

    public function testInventoryTransactionReturnedAllAfterSold()
    {
        $transaction = $this->newTransaction();

        $transaction->sold(5)->returnedAll();

        $this->assertEquals(0, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_RETURNED, $transaction->state);
    }

    public function testInventoryTransactionReturnedPartialAfterSold()
    {
        $transaction = $this->newTransaction();

        $transaction->sold(5)->returned(3);

        $this->assertEquals(2, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_SOLD, $transaction->state);
    }

    public function testInventoryTransactionReturnedAfterCheckout()
    {
        $transaction = $this->newTransaction();

        $transaction->checkout(5)->returned();

        $this->assertEquals(0, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_RETURNED, $transaction->state);
    }

    public function testInventoryTransactionReturnedAllAfterCheckout()
    {
        $transaction = $this->newTransaction();

        $transaction->checkout(5)->returnedAll();

        $this->assertEquals(0, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_RETURNED, $transaction->state);
    }

    public function testInventoryTransactionReturnedPartialAfterCheckout()
    {
        $transaction = $this->newTransaction();

        $transaction->checkout(5)->returned(2);

        $this->assertEquals(3, $transaction->quantity);
        $this->assertEquals(InventoryTransaction::STATE_COMMERCE_CHECKOUT, $transaction->state);
    }

    public function testInventoryTransactionReturnedInvalidTransactionStateException()
    {
        $transaction = $this->newTransaction();

        $this->setExpectedException('Stevebauman\Inventory\Exceptions\InvalidTransactionStateException');

        $transaction->returned(5);
    }
}