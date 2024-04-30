<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Products::all();
        return ProductsResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $post = new Products;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->stock = $request->stock;
        $post->save();

        return ("Product  create");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Products::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        $products = Products::find($id);
        $products->update($request->all());

        return ("c'est modifier");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return response("destroy", 204);
    }
}
