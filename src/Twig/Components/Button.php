<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class Button
{

    public string $label = 'Label not set';

    public function getPrefix(): string {
        return 'Prefix';
    }
}