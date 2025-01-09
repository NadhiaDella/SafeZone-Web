<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class whatUNeed extends Model
{
    use HasFactory;

    public function forms(): BelongsToMany
    {
        return $this->belongsToMany(Form::class, 'form_what_u_needs', 'whatuneed_id', 'form_id');
    }
}
