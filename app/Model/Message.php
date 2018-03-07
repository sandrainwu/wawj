<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //

	public $table="message";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'transaction', 'community','house_type', 'area', 'price', 'certificate_number', 'feature',
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
