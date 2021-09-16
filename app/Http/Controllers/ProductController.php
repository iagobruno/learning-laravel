<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', '=', 'public')->get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'qty' => ['required', 'numeric', 'min:0'],
            'description' => [],
        ]);

        $product = new Product;
        $product->fill($data);
        $product->publish();

        $request->session()->flash('success', 'Produto criado com sucesso!');

        return redirect()->route('products.show', [
            'product' => $product->slug
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->status !== 'public') {
            return abort(404);
        }

        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'qty' => ['required', 'numeric', 'min:0'],
            'description' => [],
        ]);

        $product->update($data);
        $product->save();

        $request->session()->flash('success', 'Produto atualizado!');

        return redirect()->route('products.show', [
            'product' => $product->slug
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        $request->session()->flash('success', 'Produto removido com sucesso!');

        return redirect()->route('products.index');
    }
}
