<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockchainTransaction extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //Это раскоментировать если у вас есть Payment
	/*
    public function payment(){
    	return $this->belongsTo(Payment::class);
    }
	*/
}
