<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'upload';
    public $timestamps = true;
    protected $fillable = ['original_name', 'storage_name'];
}