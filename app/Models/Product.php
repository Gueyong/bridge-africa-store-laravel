<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'user_id', // Foreign key for the user who owns the product
    ];

    /**
     * Casts for model attributes.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:2', // Ensure consistent decimal precision for price
        'quantity' => 'integer', // Ensure quantity is treated as an integer
    ];

    /**
     * Relationship: Product belongs to a User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
