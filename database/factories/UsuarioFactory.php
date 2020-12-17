<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'jose',
            'apellido' => 'alvarez',
            'cedula' => '28251308',
            'correo' => 'jose@alvarez.com',
            'imagen' => 'imagen',
            'nickname' => 'jose',
            'password' => bcrypt('jose'),
        ];
    }
}