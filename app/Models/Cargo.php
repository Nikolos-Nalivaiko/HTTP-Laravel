<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'body',
        'distance',
        'price',
        'pay_method',
        'load_region_id',
        'load_city_id',
        'load_date',
        'unload_region_id',
        'unload_city_id',
        'unload_date',
        'description',
        'urgent',
        'user_id'
    ];

    protected $casts = [
        'load_date' => 'date',
        'unload_date' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function loadRegion()
    {
        return $this->belongsTo(Region::class, 'load_region_id');
    }

    public function loadCity()
    {
        return $this->belongsTo(City::class, 'load_city_id');
    }

    public function unloadRegion()
    {
        return $this->belongsTo(Region::class, 'unload_region_id');
    }

    public function unloadCity()
    {
        return $this->belongsTo(City::class, 'unload_city_id');
    }

    public function qrCode() {
        return $this->morphOne(QrCode::class, 'qrable');
    }
}