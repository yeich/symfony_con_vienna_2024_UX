<?php

namespace App\Twig\Components\Product;

use App\Entity\Product;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Item
{

    public int $id;
    public string $title;
    public string $description;
    public string $pictureUrl;
    public float $price;

    public function mount(Product $product) {
        $this->id = $product->getId();
        $this->title = substr($product->getName(), 0, 20);
        $this->description = $product->getDescription();
        $this->pictureUrl = $product->getImage();
        $this->price = $product->getPrice();
    }
}
