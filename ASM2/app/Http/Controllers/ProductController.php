<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($builder) use ($search) {
                $builder
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->integer('category'));
        }

        $featuredProductsQuery = clone $query;

        $products = $query
            ->latest('id')
            ->paginate($request->is('admin/*') ? 10 : 8)
            ->withQueryString();

        if ($request->is('admin/*')) {
            return view('admin.products.index', compact('products'));
        }

        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        $featuredProducts = $featuredProductsQuery
            ->latest('id')
            ->take(3)
            ->get();

        $selectedCategory = $request->integer('category');

        return view('client.list', compact('products', 'categories', 'selectedCategory', 'featuredProducts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.add', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('images/products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công.');
    }

    public function showDetail(Product $product)
    {
        $product->load('category');

        $relatedProducts = Product::with('category')
            ->whereKeyNot($product->id)
            ->where('category_id', $product->category_id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('client.detail', compact('product', 'relatedProducts'));
    }
}
