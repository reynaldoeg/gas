<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['clave'=>'AG','clave3'=>'AGU','estado'=>'Aguascalientes'],
            ['clave'=>'BC','clave3'=>'BCN','estado'=>'Baja California'],
            ['clave'=>'BS','clave3'=>'BCS','estado'=>'Baja California Sur'],
            ['clave'=>'CM','clave3'=>'CAM','estado'=>'Campeche'],
            ['clave'=>'CO','clave3'=>'COA','estado'=>'Coahuila'],
            ['clave'=>'CL','clave3'=>'COL','estado'=>'Colima'],
            ['clave'=>'CS','clave3'=>'CHP','estado'=>'Chiapas'],
            ['clave'=>'CH','clave3'=>'CHH','estado'=>'Chihuahua'],
            ['clave'=>'CX','clave3'=>'CMX','estado'=>'Ciudad de México'],
            ['clave'=>'DG','clave3'=>'DUR','estado'=>'Durango'],
            ['clave'=>'GT','clave3'=>'GUA','estado'=>'Guanajuato'],
            ['clave'=>'GR','clave3'=>'GRO','estado'=>'Guerrero'],
            ['clave'=>'HG','clave3'=>'HID','estado'=>'Hidalgo'],
            ['clave'=>'JC','clave3'=>'JAL','estado'=>'Jalisco'],
            ['clave'=>'EM','clave3'=>'MEX','estado'=>'México'],
            ['clave'=>'MI','clave3'=>'MIC','estado'=>'Michoacán'],
            ['clave'=>'MO','clave3'=>'MOR','estado'=>'Morelos'],
            ['clave'=>'NA','clave3'=>'NAY','estado'=>'Nayarit'],
            ['clave'=>'NL','clave3'=>'NLE','estado'=>'Nuevo León'],
            ['clave'=>'OA','clave3'=>'OAX','estado'=>'Oaxaca'],
            ['clave'=>'PU','clave3'=>'PUE','estado'=>'Puebla'],
            ['clave'=>'QT','clave3'=>'QUE','estado'=>'Querétaro'],
            ['clave'=>'QR','clave3'=>'ROO','estado'=>'Quintana Roo'],
            ['clave'=>'SL','clave3'=>'SLP','estado'=>'San Luis Potosí'],
            ['clave'=>'SI','clave3'=>'SIN','estado'=>'Sinaloa'],
            ['clave'=>'SO','clave3'=>'SON','estado'=>'Sonora'],
            ['clave'=>'TB','clave3'=>'TAB','estado'=>'Tabasco'],
            ['clave'=>'TM','clave3'=>'TAM','estado'=>'Tamaulipas'],
            ['clave'=>'TL','clave3'=>'TLA','estado'=>'Tlaxcala'],
            ['clave'=>'VE','clave3'=>'VER','estado'=>'Veracruz'],
            ['clave'=>'YU','clave3'=>'YUC','estado'=>'Yucatán'],
            ['clave'=>'ZA','clave3'=>'ZAC','estado'=>'Zacatecas'],
        ]);
    }
}
