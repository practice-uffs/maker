<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'google_drive_id',
        'google_drive_url',
        'build_status',
        'build_status_changed_at',
        'build_output',
        'serve_url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'build_status_changed_at' => 'datetime',
    ];    

    public function user() {
        return $this->belongsTo(User::class);
    }
}
