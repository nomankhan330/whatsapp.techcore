<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MessageBulk extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages_bulk';

    protected $fillable = [
        'user_id','template_id','whatsapp_number','broadcast_name','broadcast_type','is_completed','scheduled_at','template_name'
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'scheduled_at' => 'date:Y-m-d H:i:s',
    ];
    protected function templateName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }
    protected function broadcastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }
}
