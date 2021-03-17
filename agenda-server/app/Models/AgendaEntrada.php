<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AgendaEntrada extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'agenda';
    protected $fillable = [
        'salidaFecha',
        'salidaHora',
        'salidaLugar',
        'llegadaFecha',
        'llegadaHora',
        'llegadaLugar',
        'itinerario',
        'clienteDetalle',
        'presupuesto',
        'idCliente',
        'idUsuario',
    ];
    protected $hidden = [
        'idCliente',
        'idUsuario',
        'created_at',
        'updated_at',
        'habilitado',
        'confirmada'
    ];

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'idUsuario');
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'idCliente');
    }
    public function coches()
    {
        return $this->hasMany(AgendaCoches::class, 'idAgenda', 'id');
    }
    public function conductores()
    {
        return $this->hasMany(AgendaConductores::class, 'idAgenda', 'id');
    }
}
