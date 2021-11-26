<?php

namespace Laravolt\Indonesia\Models;

use App\Models\Client;

class District extends Model
{
    protected $table = 'districts';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'city_code', 'code');
    }

    public function villages()
    {
        return $this->hasMany('Laravolt\Indonesia\Models\Village', 'district_code', 'code');
    }

    public function getCityNameAttribute()
    {
        return $this->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->city->province->name;
    }

    /**
     * Get all of the clients for the District
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
