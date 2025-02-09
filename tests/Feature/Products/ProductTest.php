<?php

use App\Models\Product;

test('test_products_can_be_indexed', function () {
    $response = $this->get('api/products');

    $response->assertStatus(200);
});

test('test_product_can_be_shown', function () {
    $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->getKey());
        $response->assertStatus(200);
});

test('test_product_can_be_stored', function () {
    $attributes = [
        'sku' => 'Test sku',
        'name' => 'Test name',
    ];

        $response = $this->post('/api/products', $attributes);
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
});

test('test_product_can_be_updated', function () {
    $product = Product::factory()->create();
    $attributes = [
        'sku' => 'Test sku',
        'name' => 'Test name',
    ];

        $response = $this->patch('/api/products/' . $product->getKey(), $attributes);
        $response->assertStatus(202);
        $this->assertDatabaseHas('products', array_merge(['id' => $product->getKey()], $attributes
    ));
});

test('test_product_can_be_destroyed', function () {
    $product = Product::factory()->create();

        $response = $this->delete('/api/products/' . $product->getKey());
        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
});
