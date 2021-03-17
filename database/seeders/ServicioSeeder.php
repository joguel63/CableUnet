<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create(['nombre'=>'Internet']);
        Servicio::create(['nombre'=>'Television']);
        Servicio::create(['nombre'=>'Telefonia']);
    }
}
