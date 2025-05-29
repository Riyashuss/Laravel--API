<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    use HasFactory;

    // Define the table name (optional if you use plural of the model name by default)
    protected $table = 'light';

    // Make the 'state' field mass assignable
    protected $fillable = ['state'];
}
