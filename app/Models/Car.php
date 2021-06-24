<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $name
 * @property int $founded
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFounded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'founded', 'description', 'image_path', 'user_id'];

    protected $hidden = ['updated_at'];

    // A car has many car models
    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    // A car has many engines through car models
    public function engines()
    {
        return $this->hasManyThrough(Engine::class, CarModel::class, 'car_id', 'model_id');
    }

    // A car has one production date through car models
    public function carProductionDate()
    {
        return $this->hasManyThrough(CarProductionDate::class, CarModel::class, 'car_id', 'model_id');
    }

    // A car belongs to many products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
