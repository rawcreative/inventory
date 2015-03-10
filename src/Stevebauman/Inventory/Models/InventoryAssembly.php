<?php

namespace Stevebauman\Inventory\Models;

use Stevebauman\Inventory\Traits\InventorySkuTrait;

/**
 * Class InventoryAssembly
 * @package Stevebauman\Inventory\Models
 */
class InventoryAssembly extends BaseModel
{
    use InventorySkuTrait;

    protected $table = 'inventory_assemblies';

    public $timestamps = false;
	
	protected $fillable = array(
		'inventory_id', 
		'part_id', 
		'quantity', 
		'depth'
		);
 
}