<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /*protected $fillable = [
        'user_id','template_name','template_category','template_language'
    ];*/

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,"user_id");
    }

    public function templateCategory()
    {
        return $this->belongsTo(TemplateCategory::class,'template_category');
    }

    public function templateLanguage()
    {
        return $this->belongsTo(TemplateLanguage::class,'template_language');
    }

    public function message()
    {
        return $this->hasOne(Message::class, 'template_id');
    }

    protected function buttonValue(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }
}
