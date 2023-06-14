<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CctvMonitor1 extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cctv_monitor1';
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function userCreateCctv()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
