<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationField extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'field', 'sort',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // ***************
    // Relationships
    // ***************

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'id', 'countries_id');
    }

}
