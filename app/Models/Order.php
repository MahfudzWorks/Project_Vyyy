<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'deadline',
        'harga',
        'status',
        'file_tugas',
        'hasil_tugas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }
}
