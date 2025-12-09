<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description', 
        'full_description',
        'achievements',
        'place',
        'image_path'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Мутатор для place - гарантируем число
    public function setPlaceAttribute($value)
    {
        $this->attributes['place'] = (int) $value;
    }

    // Аксессор для formatted_place (например: "1 Место")
    public function getFormattedPlaceAttribute()
    {
        return $this->place . " Место";
    }

    // Аксессор для image_url (полный URL к изображению)
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('images/default-player.jpg');
    }
}