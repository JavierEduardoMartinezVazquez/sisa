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
            'edad' => '19',
            'nss' => '2165131216532',
            'tel' => '7291180557',
            'curp' => 'LHDASDSD',
            'sucursal' => 'SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.',
            'area' =>'Sistemas',
            'ingreso' => '2022-05-01',
            'hentrada' =>'08:30:00',
            'hsalida' => '05:30:00',
            'rol' => 'Admin',
            'status' => 'ALTA',
        ])->assignRole('Admin');

        User::create([
            'name' => 'MARCO',
            'lastname_p' => 'POLO',
            'lastname_m' => 'BALTAZAR',
            'email' => 'marco.baltazar@socasa.com.mx',
            'password' => bcrypt('854620'),
            'edad' => '35',
            'nss' => '5331653512544',
            'tel' => '7291180557',
            'curp' => 'LHDASDSD',
            'sucursal' => 'SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.',
            'area' =>'SISTEMAS',
            'ingreso' => '2022-05-01',
            'hentrada' =>'08:30:00',
            'hsalida' => '05:30:00',
            'rol' => 'Usuar',
            'status' => 'ALTA',
        ])->assignRole('Usuar');


    }
}
