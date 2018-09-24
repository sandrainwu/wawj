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
        'reply_to_id','from_group', 'from_id', 'to_group', 'to_id', 'message_type', 'subject','appendix','readed','replyed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


}
