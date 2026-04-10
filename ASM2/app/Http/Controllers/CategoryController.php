<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query()->withCount('products');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($builder) use ($search) {
                $builder
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $categories = $query->latest('id')->paginate(8)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy(Category $category)
    {
        $productCount = $category->products()->count();

        if ($productCount > 0) {
            return redirect()->route('categories.index')
                ->with('error', "Không thể xóa danh mục này vì còn {$productCount} sản phẩm.");
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công.');
    }
}
