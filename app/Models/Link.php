<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Base
{
    //
    protected $table = 'link';
    use SoftDeletes;
}
