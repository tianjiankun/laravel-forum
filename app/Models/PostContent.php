<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostContent extends Base
{
    //
    protected $table = 'post_content';
    use SoftDeletes;
}
