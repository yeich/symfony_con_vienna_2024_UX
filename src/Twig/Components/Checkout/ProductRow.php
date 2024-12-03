<?php

namespace App\Twig\Components\Checkout;

use App\Entity\Product;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsLiveComponent]
final class ProductRow
{

    use DefaultActionTrait;
    use ComponentToolsTrait;

    public string $title;
    public float $price;

    public int $quantity;

    public function mount(Product $product) {
        $this->title = substr($product->getName(), 0, 20);
        $this->price = $product->getPrice();

        if(session_status() !== PHP_SESSION_ACTIVE) session_start();

        $sessionProductItems = 0;

        if(array_key_exists('addedProducts', $_SESSION)) {
            $sessionProductItems = $_SESSION['addedProducts'][$product->getId()] ?? 0;
        }

        $this->quantity = $sessionProductItems;
    }

    #[LiveAction]
    public function removeFromCart() {
        $this->emit('addItemToCartChange');
    }

    #[LiveAction]
    public function addToCart() {
        $this->emit('addItemToCartChange');
    }
}
