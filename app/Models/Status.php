<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['debtor', 'receiver', 'value'];

	public $timestamps = false;

    public function userDebtor()
    {
        return $this->belongsTo('App\Models\User', 'debtor');
    }

    public function userReceiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver');
    }
}
