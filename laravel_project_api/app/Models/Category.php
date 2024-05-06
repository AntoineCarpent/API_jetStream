<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Category",
 *     description="Category model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier for a category",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the category",
 *         example="Electronics"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the category",
 *         example="Electronic devices and accessories"
 *     )
 * )
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Define the relationship with products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
}
