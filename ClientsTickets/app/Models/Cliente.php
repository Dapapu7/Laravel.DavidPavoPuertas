<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    
    protected $primaryKey = 'idCliente';
}
