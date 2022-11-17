<?php

namespace App\Models;

use App\Models\Token;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    /**
     * Relation with token
     */
    public function tokens() : BelongsToMany
    {
        return $this->belongsToMany(Token::class, 'token_tag');
    }
}
