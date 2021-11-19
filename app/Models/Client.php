<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Client extends Model
{
    use HasFactory, Uuids;


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $cast = [
        // 
    ];

    protected $append = [
      'user_selfie', 'id_card_picture',
    ];

    protected $dates = [
        'user_position_start_date',
        'birth_date',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [

        'user_id', 'dealer_group', 'full_name', 'birth_place',
        'birth_date', 'gender', 'religion',
        'education', 'marital_status', 'honda_id',

        'id_card_number', 'id_card_address', 'id_card_province',
        'id_card_city', 'id_card_districts', 'id_card_village',
        'id_card_postal_code', 'id_card_picture',

        'home_address', 'home_province', 'home_city', 'home_districts',
        'home_village', 'home_postal_code',

        'email_user', 'facebook_id', 'instagram_id', 'twitter_id',
        'telph_number', 'phone_number', 'relatives_phone_number',
        'user_hobby_1', 'user_hobby_2', 'user_hobby_3',
        'user_supervisor', 'user_coordinator', 'user_position',
        'user_position_start_date', 'user_selfie',
    ];
}
