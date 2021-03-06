<?php

namespace Stevebauman\Inventory\Interfaces;

/**
 * The Stateable Interface used for stateable Inventory Transaction models
 *
 * Interface StateableInterface
 * @package Stevebauman\Inventory\Interfaces
 */
interface StateableInterface
{
    //E-Commerce states
    const STATE_COMMERCE_CHECKOUT = 'commerce-checkout';
    const STATE_COMMERCE_SOLD = 'commerce-sold';
    const STATE_COMMERCE_RETURNED = 'commerce-returned';
    const STATE_COMMERCE_RETURNED_PARTIAL = 'commerce-returned-partial';
    const STATE_COMMERCE_RESERVED = 'commerce-reserved';
    const STATE_COMMERCE_BACK_ORDERED = 'commerce-back-ordered';
    const STATE_COMMERCE_BACK_ORDER_FILLED = 'commerce-back-order-filled';

    //Inventory Order states
    const STATE_ORDERED_PENDING = 'order-on-order';
    const STATE_ORDERED_RECEIVED = 'order-received';
    const STATE_ORDERED_RECEIVED_PARTIAL = 'order-received-partial';

    //Inventory Management states
    const STATE_INVENTORY_ON_HOLD = 'inventory-on-hold';
    const STATE_INVENTORY_RELEASED = 'inventory-released';
    const STATE_INVENTORY_RELEASED_PARTIAL = 'inventory-released-partial';
    const STATE_INVENTORY_REMOVED = 'inventory-removed';
    const STATE_INVENTORY_REMOVED_PARTIAL = 'inventory-removed-partial';

    //Global states
    const STATE_CANCELLED = 'cancelled';
    const STATE_OPENED = 'opened';

    public function checkout($quantity = NULL);

    public function sold($quantity = NULL);

    public function soldAmount($quantity);

    public function returned($quantity = NULL);

    public function returnedPartial($quantity);

    public function returnedAll();

    public function reserved($quantity = NULL, $backOrder = false);

    public function backOrder($quantity);

    public function fillBackOrder();

    public function ordered($quantity);

    public function received($quantity = NULL);

    public function receivedPartial($quantity);

    public function receivedAll();

    public function hold($quantity);

    public function release($quantity = NULL);

    public function releasePartial($quantity);

    public function releaseAll();

    public function remove($quantity = NULL);

    public function removePartial($quantity);

    public function removeAll();

    public function cancel();
}