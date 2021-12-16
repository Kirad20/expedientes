<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['path', 'tipo', 'expediente_id'];

    protected $searchableFields = ['*'];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
