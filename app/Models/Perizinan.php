<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'perizinan';

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'user_id',
        'date',
        'status',
        'foto',
    ];

    // Relasi many-to-one ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
