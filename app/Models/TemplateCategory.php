<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    use HasFactory;
    protected $table = 'templates_categories';

    public function template()
    {
        return $this->hasOne(Template::class);
    }
}
