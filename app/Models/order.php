<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $timestamp=false;
    protected $fillable=[
        'user_id',
        'status',
        'total',
        'quantity'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
