<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'id';
    protected $fillable = [
        'namaAlbum',
        'deskripsi',
        'tanggalDibuat',
        'user_id',
    ];

    /**
     * Retrieve the associated User model for this album.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The User model associated with this album.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define a one-to-many relationship with the foto model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The relationship between album and fotos.
     */
    public function foto()
    {
        return $this->hasMany(foto::class, 'id');
    }
}
