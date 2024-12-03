<?php

namespace App\Twig\Components\Checkout;

use App\Entity\Product;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ProductRow
{

    public string $title;
    public float $price;

    public function mount(Product $product) {
        $this->title = substr($product->getName(), 0, 20);
        $this->price = $product->getPrice();
    }
}
