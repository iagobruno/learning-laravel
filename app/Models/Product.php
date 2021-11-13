<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'price',
        'qty',
        'description'
    ];


    //#region Relationships
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    //#endregion


    //#region Methods
    public function publish()
    {
        $this->status = 'public';
        $this->published_at = now();
        $this->save();
    }
    //#endregion

    public function getFormatedPriceAttribute()
    {
        return number_format($this->price, 2, ',', ' ');
    }


    /**
     * Get the route key for implict binding.
     * @see https://laravel.com/docs/8.x/routing#implicit-binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
