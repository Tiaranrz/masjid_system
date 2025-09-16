<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk dengan search & pagination
     */
    public function index(Request $request)
    {
        $query = Event::query();

        // Search by product_name
        if ($request->filled('q')) {
            $query->where('event_name', 'like', '%' . $request->q . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.event.index', compact('event'));
    }

    /**
     * Form tambah produk
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['product_name', 'category', 'price', 'description']);

        // Upload icon jika ada
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Form edit produk
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update produk
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['product_name', 'category', 'price', 'description']);

        // Upload icon baru jika ada
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($product->icon && Storage::disk('public')->exists($product->icon)) {
                Storage::disk('public')->delete($product->icon);
            }
            $data['icon'] = $request->file('icon')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus icon jika ada
        if ($product->icon && Storage::disk('public')->exists($product->icon)) {
            Storage::disk('public')->delete($product->icon);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
