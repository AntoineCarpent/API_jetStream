<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/welcome",
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
        $products = Products::latest()->paginate(5);
        return ProductsResource::collection($products);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/products/category/{id}",
     *     summary="Get products by category",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of products by category",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Products")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string"),
     *         )
     *     )
     * )
     */
    public function welcomecategory($id)
    {
        $products = Products::whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->latest()->paginate(5);

        if ($products->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return ProductsResource::collection($products);
    }
}
