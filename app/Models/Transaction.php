<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

	protected $fillable = ['value', 'description', 'paid_by', 'created_by', 'status_id'];

	protected $dates = ['created_at', 'updated_at'];

	public function paidBy()
	{
		return $this->belongsTo('App\Models\User', 'paid_by');
	}

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
