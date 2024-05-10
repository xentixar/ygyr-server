<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'label_id'];

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }
}
