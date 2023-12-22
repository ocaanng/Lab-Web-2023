<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['nama','pengajar', 'deskripsi', 'materi','thumbnail','link'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}