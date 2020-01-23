<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $connection = 'mysql';
    protected $table = 'agenda.phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand', 'model', 'serial_number',
        'phone_number_1', 'phone_number_2',
        'quick_dial', 'imei_1', 'imei_2', 'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'agenda.phone_user', 'phone_id', 'user_id');
    }

    public function search($filter)
    {
        return $this->where('phone_number_1', 'LIKE', "%{$filter->search}%")
            ->orWhere('brand', 'LIKE', "%{$filter->search}%")
            ->orWhere('model', 'LIKE', "%{$filter->search}%")
            ->orWhereHas('users', function ($query) use ($filter) {
                $query->where('masp_museu.usuarios.nome', 'LIKE', "%{$filter->search}%");
            })
            ->with('users')
            ->paginate($filter->paginate);
    }

    public function detachUsers()
    {
        $this->users()->detach($this->users()->pluck('cod_usuario')->all());
        return $this;
    }

    public function attachUsers()
    {
        $this->users()->attach(collect(json_decode(request('usuarios')))->pluck('cod_usuario')->all());
        return $this;
    }
}
