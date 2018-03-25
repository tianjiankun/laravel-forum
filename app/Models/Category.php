<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Base
{
    use SoftDeletes;
    protected  $table = 'category';
    //
}
