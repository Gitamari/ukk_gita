<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = 'like';
    protected $primaryKey = 'id';
    protected $fillable = [
        'foto_id',
        'user_id',
        'tanggalLike',
        'likeName',
    ];

    /**
     * Get the associated foto model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id');
    }

    /**
     * Retrieve the associated User model for this like.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo The User model associated with this like.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
