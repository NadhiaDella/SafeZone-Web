<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class reasonComplainers extends Model
{
    use HasFactory;

    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class, 'form_reason_complainers', 'reasonComplainer_id', 'form_id');
    }
}
