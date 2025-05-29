<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $table='task';
   protected $primarykey='id';
  protected $fillable = ['name', 'address', 'phone'];
  public $timestamps = false;
   
   use HasFactory;
}
