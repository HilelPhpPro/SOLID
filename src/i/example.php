<?php
namespace i1;
interface ItemInterface
{
    public function applyDiscount($discount);

    public function applyPromocode($promocode);

    public function setColor($color);

    public function setSize($size);

    public function getConditionNew(): bool;

    public function getPrice(): float;
}












namespace i2;

interface ItemInterface
{
    public function getConditionNew(): bool;

    public function getPrice(): float;
}

interface ClothesInterface
{
    public function setColor($color);

    public function setSize($size);

    public function setMaterial($material);
}

interface DiscountableInterface
{
    public function applyDiscount($discount);

    public function applyPromocode($promocode);
}

class Coat implements ClothesInterface, ItemInterface
{

    public function setColor($color)
    {
        // TODO: Implement setColor() method.
    }

    public function setSize($size)
    {
        // TODO: Implement setSize() method.
    }

    public function setMaterial($material)
    {
        // TODO: Implement setMaterial() method.
    }

    public function getConditionNew(): bool
    {
        // TODO: Implement getConditionNew() method.
    }

    public function getPrice(): float
    {
        // TODO: Implement getPrice() method.
    }
}

class Tv implements DiscountableInterface, ItemInterface
{


    public function applyDiscount($discount)
    {
        // TODO: Implement applyDiscount() method.
    }

    public function applyPromocode($promocode)
    {
        // TODO: Implement applyPromocode() method.
    }

    public function getConditionNew(): bool
    {
        // TODO: Implement getConditionNew() method.
    }

    public function getPrice(): float
    {
        // TODO: Implement getPrice() method.
    }
}

/**
 * @param ItemInterface[] $items
 * @return void
 */
function orderHandler(array $items)
{
    $discount = 10;

    $price = 0;
    foreach ($items as $item) {
        if ($item instanceof DiscountableInterface) {
            $item->applyDiscount($discount);
        }

        $iPrice = $item->getPrice();
        if (!$item->getConditionNew()) {
            $iPrice = $iPrice / 100 * 30;
        }
        $price += $iPrice;

    }
    //
}