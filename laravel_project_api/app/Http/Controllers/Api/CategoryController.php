<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/categories",
     *     summary="Get list of categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of categories",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Category")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/categories",
     *     summary="Create a new category",
     *     tags={"Category"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category created successfully",
     *         @OA\JsonContent(type="string", example="Category created")
     *     )
     * )
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $categories = new Category;
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->save();

        return response()->json("Category created", 200);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/categories/{id}",
     *     summary="Get a specific category by ID",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category details",
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     )
     * )
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/categories/{id}",
     *     summary="Update an existing category",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category updated successfully",
     *         @OA\JsonContent(type="string", example="Category updated")
     *     )
     * )
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $categories = Category::find($id);
        $categories->update($request->all());
        return response()->json("Category updated", 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/categories/{id}",
     *     summary="Delete an existing category",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Category deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return response(null, 204);
    }
}
