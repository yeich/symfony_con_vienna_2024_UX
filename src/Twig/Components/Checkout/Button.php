<?php

namespace App\Twig\Components\Checkout;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class Button extends AbstractController
{

    use DefaultActionTrait;
    use ComponentToolsTrait;

    #[LiveProp]
    public int $totalItems = 0;

    public function __construct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();

        $sessionItems = 0;

        if(array_key_exists('addedProducts', $_SESSION)) {
            foreach ($_SESSION['addedProducts'] as $key => $value) {
                $sessionItems += $value;
            }
        }

        $this->totalItems = $sessionItems;
    }

    #[LiveListener('addItemToCartChange')]
    public function onAddItemToCartChange(#[LiveArg] int $productId) {
        $this->totalItems += 1;
        $this->updateSession($productId);
    }

    #[LiveListener('removeItemFromCartChange')]
    public function onRemoveItemromCartChange(#[LiveArg] int $productId) {
        if($this->totalItems > 0) {
            $this->totalItems -= 1;
        }

        $this->updateSession($productId);
    }

    private function updateSession(int $productId) {

        if(!array_key_exists('addedProducts', $_SESSION)) {
            $_SESSION['addedProducts'] = [];
        }

        $productItems = $_SESSION['addedProducts'][$productId] ?? 0;

        $_SESSION['addedProducts'][$productId] = $productItems + 1;
    }
}