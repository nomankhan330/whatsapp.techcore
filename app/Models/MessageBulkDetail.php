<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageBulkDetail extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages_bulk_details';

    protected $fillable = [
        'bulk_id','user_id','contact_number','message_type','message','is_sent','read_status','message_status','template_name','template_id'
    ];
}
