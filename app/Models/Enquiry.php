<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','exchange','wallet_address','amount','order_type','get_amount','current_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
