<?php

namespace Stevebauman\Inventory\Traits;

trait AssemblyTrait
{

    protected $inventoryAssembly = 'Stevebauman\Inventory\Models\InventoryAssembly';

    /**
     * @return mixed
     */
    public function makeAssembly()
    {

        $assembly = new $this->inventoryAssembly([
            'inventory_id' => $this->id,
            'part_id' => $this->id,
            'depth' => 0,
        ]);
        $assembly->save();

        $this->assembly = true;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAssemblyItems()
    {
        $id = $this->id;
        return $this->select('inventories.*', 'inventory_assemblies.quantity')->join('inventory_assemblies', function ($join) use ($id) {
            $join->on('inventories.id', '=', 'inventory_assemblies.part_id')
            ->where('inventory_assemblies.inventory_id', '=', $id)
            ->where('inventory_assemblies.depth', '>', 0);
        })->get();
    }

    /**
     * @param $part
     * @param $qty
     * @param $depth
     * @param null $returnPart
     */
    public function addAssemblyItem($part, $qty = 1, $depth = null, $returnPart = false)
    {

        if ($this->exists) {

            if (is_null($depth)) {
                $depth = 1;
            }

            $partAssembly = new $this->inventoryAssembly([
                'inventory_id' => $this->id,
                'part_id' => $part->id,
                'quantity' => $qty,
                'depth' => $depth,
            ]);

            $partAssembly->save();
        }

        return ($returnPart === true ? $part : $this);
    }

    /**
     * @param $parts
     */
    public function addAssemblyItems(array $parts)
    {}

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAssembly($query)
    {
        return $query->where('assembly', '=', true);
    }

}
