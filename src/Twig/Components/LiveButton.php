<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class LiveButton
{

    use DefaultActionTrait;

    #[LiveProp]
    public int $total = 0;

    #[LiveAction]
    public function increment() {
        $this->total++;
    }
}