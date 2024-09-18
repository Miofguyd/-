<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sled extends Model
{
    use HasFactory;
}

function user()
{
    return $this->belomgsTo(User::class);
}