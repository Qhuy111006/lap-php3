<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows categories and filters products on the store page', function () {
    $phoneCategory = Category::create([
        'name' => 'Dien thoai',
        'description' => 'Danh muc dien thoai',
    ]);

    $laptopCategory = Category::create([
        'name' => 'Laptop',
        'description' => 'Danh muc laptop',
    ]);

    $phoneProduct = Product::create([
        'category_id' => $phoneCategory->id,
        'name' => 'iPhone 15',
        'price' => 20000000,
        'quantity' => 10,
        'description' => 'Dien thoai Apple',
    ]);

    Product::create([
        'category_id' => $laptopCategory->id,
        'name' => 'MacBook Air',
        'price' => 25000000,
        'quantity' => 5,
        'description' => 'Laptop Apple',
    ]);

    $response = $this->get(route('client.product.index', ['category' => $phoneCategory->id]));

    $response
        ->assertOk()
        ->assertSee($phoneProduct->name)
        ->assertSee('20.000.000 VND')
        ->assertSee('Xem chi tiết')
        ->assertDontSee('MacBook Air');
});

it('allows guests to open product detail', function () {
    $category = Category::create([
        'name' => 'Dien thoai',
        'description' => 'Danh muc dien thoai',
    ]);

    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Galaxy S25',
        'price' => 18000000,
        'quantity' => 6,
        'description' => 'San pham test',
    ]);

    $this->get(route('client.product.detail', $product))
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee('18.000.000 VND');
});

it('shows related products on the detail page', function () {
    $category = Category::create([
        'name' => 'Laptop',
        'description' => 'Danh muc laptop',
    ]);

    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'ThinkPad X1',
        'price' => 30000000,
        'quantity' => 3,
        'description' => 'San pham test',
    ]);

    $related = Product::create([
        'category_id' => $category->id,
        'name' => 'ThinkPad T14',
        'price' => 28000000,
        'quantity' => 4,
        'description' => 'San pham lien quan',
    ]);

    $this->get(route('client.product.detail', $product))
        ->assertOk()
        ->assertSee($related->name);
});

it('redirects admins to the products page after login', function () {
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => '123456',
        'role' => 1,
    ]);

    $this->post(route('login'), [
        'email' => $admin->email,
        'password' => '123456',
    ])->assertRedirect(route('products.index'));
});

it('prevents normal users from accessing admin routes', function () {
    $user = User::create([
        'name' => 'Normal User',
        'email' => 'member@example.com',
        'password' => 'password',
        'role' => 0,
    ]);

    $this->actingAs($user)
        ->get(route('products.index'))
        ->assertRedirect(route('client.product.index'));
});
