<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class salehouse extends Model
{
    //

	public $table="salehouse";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'community','house_type', 'area', 'certificate_number', 'feature',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];


}
