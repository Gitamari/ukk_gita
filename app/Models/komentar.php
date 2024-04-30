<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'foto_id',
        'user_id',
        'komentarName',
        'isiKomentar',
        'tanggalKomentar'
    ];

    /**
     * Retrieve the associated foto model for this komentar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The foto model associated with this komentar.
     */
    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id');
    }
}
