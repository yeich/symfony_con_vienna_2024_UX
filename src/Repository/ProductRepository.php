<?php

namespace App\Repository;

use App\Entity\Product;

class ProductRepository
{
    public function get(int $id): Product
    {
        if (null === $product = self::PRODUCTS[$id] ?? null) {
            throw new \InvalidArgumentException(sprintf('Product with id "%s" not found.', $id));
        }

        return $this->hydrate($product);
    }

    private function hydrate(array $product): Product
    {
        $product['image'] = sprintf('https://picsum.photos/seed/%s/400/300', $product['id']);

        return new Product(...$product);
    }

    public function all(): array
    {
        $products = [];
        foreach (self::PRODUCTS as $product) {
            $products[] = $this->hydrate($product);
        }

        return $products;
    }

    private const PRODUCTS = [
        1 => [
            'id' => 1,
            'name' => 'Product 1',
            'description' => 'Description of product 1',
            'price' => 100.00,
        ],
        2 => [
            'id' => 2,
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'price' => 200.00,
        ],
        3 => [
            'id' => 3,
            'name' => 'Product 3',
            'description' => 'Description of product 3',
            'price' => 300.00,
        ],
    ];

}