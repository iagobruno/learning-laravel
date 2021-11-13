<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 'public')->get();

        return view('products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Product::class);

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create', Product::class);

        $data = $request->validated();

        $product = new Product;
        $product->fill($data);
        $product->created_by = Auth::user()->id;
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
        Gate::authorize('view', $product);

        return view('products.show', compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        return view('products.edit', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $data = $request->validated();

        $product->update($data);

        $request->session()->flash('success', 'Produto atualizado!');

        return redirect()->route('products.show', ['product' => $product->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();

        $request->session()->flash('success', 'Produto removido com sucesso!');

        return redirect()->route('products.index');
    }
}
