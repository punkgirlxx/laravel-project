<?php
/*  KB - 26-01-2025
    Record
    comes with the fillable fields of title, category, body and is draft
*/
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category', 'body', 'is_draft'];
}
