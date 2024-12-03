<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent(
    exposePublicProps: true,
)]
class Button
{
    #[ExposeInTemplate(destruct: true)]
    public array $props = [];

    public string $label = 'Submit';

    public function getPrefix(): string
    {
        return 'my prefix';
    }
    public function getColor(): string
    {
        return 'red';
    }
}