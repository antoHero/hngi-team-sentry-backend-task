<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //create attributes that should be included in the model's array and JSON representation

    protected $visible = ['page_title', 'page_content'];
}
