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
        'from_id', 'to_id', 'message_type','route', 'subject',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


}
