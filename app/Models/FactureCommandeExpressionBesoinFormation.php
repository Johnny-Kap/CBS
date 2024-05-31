<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeExpressionBesoinFormation extends Model
{
    use HasFactory;

    public function expressions_besoin_formation(){
        return $this->belongsTo(ExpressionBesoinFormation::class, 'expression_besoin_formation_id', 'id');
    }
}
