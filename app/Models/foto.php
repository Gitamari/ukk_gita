<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $table = 'foto';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judulFoto',
        'deskripsi',
        'tanggalUnggah',
        'lokasifile',
        'album_id',
        'user_id',
    ];

    /**
     * Retrieve the associated User model for this foto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The User model associated with this foto.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Retrieve the likes associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(like::class, 'id');
    }

    /**
     * Retrieve the comments associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany The relationship between the model and the comments.
     */
    public function comments()
    {
        return $this->hasMany(komentar::class, 'foto_id');
    }

    /**
     * Retrieve the associated album model for this photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The album model associated with this photo.
     */
    public function album()
    {
        return $this->belongsTo(album::class, 'album_id');
    }


}
