<?php

namespace Database\Seeders;
use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create(['nombre'=>'Venevision']);
        Channel::create(['nombre'=>'Globovision']);
        Channel::create(['nombre'=>'TNT']);
        Channel::create(['nombre'=>'AnimalPlanet']);
        Channel::create(['nombre'=>'Discovery Channel']);
        Channel::create(['nombre'=>'Natgeo']);
        Channel::create(['nombre'=>'MTV']);
        Channel::create(['nombre'=>'TRT']);
        Channel::create(['nombre'=>'Disney Channel']);
        Channel::create(['nombre'=>'Coracol']);
        Channel::create(['nombre'=>'Telemundo']);
        Channel::create(['nombre'=>'RCTV']);
        Channel::create(['nombre'=>'Canal 5']);
        Channel::create(['nombre'=>'BBC']);
        Channel::create(['nombre'=>'Enlace TV']);
        Channel::create(['nombre'=>'Meridiano']);
        Channel::create(['nombre'=>'ESPN']);
        Channel::create(['nombre'=>'FOX-Sport']);
        Channel::create(['nombre'=>'FOX']);
        Channel::create(['nombre'=>'XF']);
        Channel::create(['nombre'=>'Golden']);
        Channel::create(['nombre'=>'TLC']);
        Channel::create(['nombre'=>'SyFy']);
        Channel::create(['nombre'=>'HBO']);
        Channel::create(['nombre'=>'Televen']);
        Channel::create(['nombre'=>'Wanner TV']);
        Channel::create(['nombre'=>'Univision']);
        Channel::create(['nombre'=>'A&E']);    
        Channel::create(['nombre'=>'CNN']);    
    }
}
