<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
	protected $guarded = [];

	public function client(){
		return $this->belongsTo(Client::class, 'client_id', 'id');
	}

}
