<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateLanguage extends Model
{
    use HasFactory;
    protected $table = 'templates_languages';

    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
