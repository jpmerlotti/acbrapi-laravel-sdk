<?php

namespace ACBr\Laravel\Tests\Fixtures;

use ACBr\Laravel\Traits\InteractsWithACBr;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use InteractsWithACBr;

    protected $table = 'users';
}
