<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

/**
 * @OA\Schema(
 *     title="Products",
 *     description="Products model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The unique identifier for a product",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="The name of the product",
 *         example="Smartphone"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the product",
 *         example="High-end smartphone with advanced features"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         type="number",
 *         format="float",
 *         description="The price of the product",
 *         example=999.99
 *     ),
 *     @OA\Property(
 *         property="stock",
 *         type="integer",
 *         description="The stock quantity of the product",
 *         example=100
 *     ),
 *     @OA\Property(
 *         property="image",
 *         type="string",
 *         description="The image URL of the product",
 *         example="https://example.com/image.jpg"
 *     )
 * )
 */
class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    /**
     * Define the relationship with categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
