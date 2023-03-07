<?php


use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'JAVIER EDUARDO',
            'lastname_p' => 'MARTINEZ',
            'lastname_m' => 'VAZQUEZ',
            'email' => 'javier.martinez@socasa.com.mx',
            'password' => bcrypt('854620'),
            'nss' => '2165131216532',
            'tel' => '7291180557',
            'curp' => 'MAVJ021013HMCRZVA0',
            'rfc' => 'MAVJ021013',
            'empresa_id' => 'SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.',
            'puesto' =>'SISTEMAS',
            'ingreso' => '2022-05-01',
            'horariolv_id' =>'08:30:00',
            'horariosab_id' => '05:30:00',
            'diasvacaciones' => '6',
            'rol' => 'Admin',
            'status' => 'ALTA',
            'foto' => 'img\usersfoto\usuario.jpg',
        ])->assignRole('Admin');

        User::create([
            'name' => 'MARCO',
            'lastname_p' => 'POLO',
            'lastname_m' => 'BALTAZAR',
            'email' => 'marco.baltazar@socasa.com.mx',
            'password' => bcrypt('854620'),
            'nss' => '5331653512544',
            'tel' => '7291180557',
            'curp' => 'LHDASDSD',
            'rfc' => 'SADHJASGB',
            'empresa_id' => 'SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.',
            'puesto' =>'SISTEMAS',
            'ingreso' => '2022-05-01',
            'horariolv_id' =>'08:30:00',
            'horariosab_id' => '05:30:00',
            'rol' => 'Usuar',
            'diasvacaciones' => '6',
            'status' => 'ALTA',
            'foto' => 'img\usersfoto\usuario.jpg',
        ])->assignRole('Usuar');


    }
}
