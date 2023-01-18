<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'client_name','address','contact_person','contact_number', 'email', 'status','user_id','user_access_token','waba_id','phone_number_id','wa_number'
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
