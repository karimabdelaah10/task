<?php

namespace App\Modules\Country;

use App\Modules\BaseApp\Traits\HasAttach;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use HasAttach;
    use Translatable;

    protected $table = 'countries';
    protected $fillable = [
        'country_code',
        'flag',
        'is_active',
    ];
    public $translatedAttributes = [
        'name',
        'currency_code'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected static array $attachFields = [
        'flag' => [
            'sizes' => ['small' => 'resize,200x150', 'large' => 'resize,400x300'],
            'modulePath' => 'countries',
            'path' => 'uploads'
        ],
    ];

    public function scopeFilterable($query)
    {
        return $query->when(request()->search_key, function ($q) {
            return $q->whereTranslationLike('name', '%' . request()->search_key . '%')
                ->orWhereTranslationLike('currency_code', '%' . request()->search_key . '%')
                ->orWhere('country_code', 'like', '%' . request()->search_key . '%');
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}
