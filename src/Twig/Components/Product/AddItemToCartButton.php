<?php

namespace App\Twig\Components\Product;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class AddItemToCartButton
{

    use DefaultActionTrait;
    use ComponentToolsTrait;

    #[LiveProp]
    public int $productId;

    #[LiveAction]
    public function addToCart(#[LiveArg] int $id) {
        $this->emit('addItemToCartChange', [
            'productId' => $id
        ]);
    }
}