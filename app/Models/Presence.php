<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model {
    use HasFactory;

    protected $table = 'presences';
    protected $guarded = ['id'];
    protected $fillable = [
        'meetings_id',
        'nim',
        'presence_date',
        'status',
        'ket',
        'feedback',
        'token',
    ];

    protected $with = [
        'meetings',
        'user'
    ];

    public function getRouteKeyName() {
        return 'nim';
    }

    public function meetings() {
        return $this->belongsTo(Meetings::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'nim');
    }
}
