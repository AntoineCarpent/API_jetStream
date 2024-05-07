<?php

/**
 * @OA\Tag(
 *     name="Products",
 *     description="API Endpoints for Products"
 * )
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/products",
     *     summary="Get list of products",
     *     tags={"Products"},
     *     @OA\Response(
     *         response=200,
     *         description="List of products",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Products")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $posts = Products::all();
        return ProductsResource::collection($posts);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="stock", type="integer"),
     *             @OA\Property(property="image", type="string", format="binary"),
     *             @OA\Property(property="category_id", type="array", @OA\Items(type="integer")),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product created successfully",
     *         @OA\JsonContent(type="string", example="Product created")
     *     )
     * )
     */
    public function store(StoreProductsRequest $request)
    {
        $categories = json_decode($request->category_id, true);
        $request->merge(['category_id' => $categories]);

        $post = new Products;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->stock = $request->stock;
        $post->image = $request->image;
        $post->save();

        $post->categories()->attach($categories);

        $this->storeImage($post);

        return ("Product  create");
    }

    /**
     * @OA\Get(
     *     path="/api/v1/products/{id}",
     *     summary="Get a specific product by ID",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product details",
     *         @OA\JsonContent(ref="#/components/schemas/Products")
     *     )
     * )
     */
    public function show($id)
    {
        $product = Products::find($id);
        return ProductsResource::make($product);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/products/{id}",
     *     summary="Update an existing product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="stock", type="integer"),
     *             @OA\Property(property="image", type="string", format="binary"),
     *             @OA\Property(property="category_id", type="array", @OA\Items(type="integer")),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully",
     *         @OA\JsonContent(type="string", example="Product updated")
     *     )
     * )
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        $categories = json_decode($request->category_id, true);
        $request->merge(['category_id' => $categories]);

        $products = Products::find($id);
        $products->update($request->all());

        $products->categories()->sync($categories);

        $this->storeImage($products);

        return ("c'est modifier");
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/products/{id}",
     *     summary="Delete an existing product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Product deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->categories()->detach();
        $products->delete();
        return response("destroy", 204);
    }

    private function storeImage(Products $products){

        if (request('image')){

            $products->update([

                'image' => request('image')->store('image', 'public'),
            ]);
        }
    }
}
