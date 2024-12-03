<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ProductItem
{

    public int $maxTitleChars = 20;

    public string $title = 'Product';
    public string $description = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.';

    public string $pictureUrl;
    public int $id;

    public string $price;
}
