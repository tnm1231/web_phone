<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
            'main_banner_1',
            'start_price',
            'name_product',
            'sale_offer',
            'is_view',

            'main_banner_2',
            'start_price_2',
            'name_product_2',
            'sale_offer_2',
            'is_view_2',

            'main_banner_3',
            'start_price_3',
            'name_product_3',
            'sale_offer_3',
            'is_view_3',

            'sub_banner_4',
            'start_price_4',
            'name_product_4',
            'sale_offer_4',
            'is_view_4',

    ];
}
