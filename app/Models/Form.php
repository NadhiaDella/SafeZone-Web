<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Form extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function advocat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'advocat_id');
    }
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function form_type(): BelongsTo
    {
        return $this->belongsTo(formType::class, 'form_type_id');
    }

    public function reasons(): BelongsToMany
    {
        return $this->belongsToMany(reasonComplainers::class, 'form_reason_complainers', 'form_id', 'reasonComplainer_id');
    }

    public function needs(): BelongsToMany
    {
        return $this->belongsToMany(whatUNeed::class, 'form_what_u_needs', 'form_id', 'whatuneed_id');
    }
}
