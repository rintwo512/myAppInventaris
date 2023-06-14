<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteAC extends Model
{
    use HasFactory;
    protected $table = 'note_ac';
    protected $fillable = ['petugas', 'tanggal', 'aksi'];
}
