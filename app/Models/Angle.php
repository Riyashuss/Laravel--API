<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angle extends Model
{
    use HasFactory;

    protected $table = 'angle'; // Manually created table
    protected $fillable = ['up', 'down', 'left_dir', 'right_dir', 'stop'];
    
    // Enable timestamps
    public $timestamps = true;
}

