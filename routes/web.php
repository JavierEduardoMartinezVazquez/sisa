<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Start', 'WelcomeControlles@Start')->name('Start');

/*---------------Controlador Usuarios-----------------*/
Route::get('User', 'UserController@User')->name('User');
Route::get('obtener_ultimo_id_user', 'UserController@obtener_ultimo_id_user')->name('obtener_ultimo_id_user');
Route::get('obtener_empresa', 'UserController@obtener_empresa')->name('obtener_empresa');
Route::get('obtener_horario', 'UserController@obtener_horario')->name('obtener_horario');
Route::get('obtener_roles', 'UserController@obtener_roles')->name('obtener_roles');
Route::post('guardar_user', 'UserController@guardar_user')->name('guardar_user');
Route::get('listar_user', 'UserController@listar_user')->name('listar_user');
Route::get('obtener_user', 'UserController@obtener_user')->name('obtener_user');
Route::post('modificar_user', 'UserController@modificar_user')->name('modificar_user');
Route::get('verificar_baja_user', 'UserController@verificar_baja_user')->name('verificar_baja_user');
Route::post('baja_user', 'UserController@baja_user')->name('baja_user');

/*---------------Controlador empresas-----------------*/
Route::get('Business', 'BusinessController@Business')->name('Business');
Route::get('obtener_ultimo_id_business', 'BusinessController@obtener_ultimo_id_business')->name('obtener_ultimo_id_business');
Route::post('guardar_business', 'BusinessController@guardar_business')->name('guardar_business');
Route::get('listar_business', 'BusinessController@listar_business')->name('listar_business');
Route::get('obtener_business', 'BusinessController@obtener_business')->name('obtener_business');
Route::post('modificar_business', 'BusinessController@modificar_business')->name('modificar_business');
Route::get('verificar_baja_business', 'BusinessController@verificar_baja_business')->name('verificar_baja_business');
Route::post('baja_business', 'BusinessController@baja_business')->name('baja_business');

/*---------------Controlador Horarios-----------------*/
Route::get('Hourhand', 'HourhandController@Hourhand')->name('Hourhand');
Route::get('obtener_ultimo_id_hourhand', 'HourhandController@obtener_ultimo_id_hourhand')->name('obtener_ultimo_id_hourhand');
Route::post('guardar_hourhand', 'HourhandController@guardar_hourhand')->name('guardar_hourhand');
Route::get('listar_hourhand', 'HourhandController@listar_hourhand')->name('listar_hourhand');
Route::get('obtener_hourhand', 'HourhandController@obtener_hourhand')->name('obtener_hourhand');
Route::post('modificar_hourhand', 'HourhandController@modificar_hourhand')->name('modificar_hourhand');
Route::get('verificar_baja_hourhand', 'HourhandController@verificar_baja_hourhand')->name('verificar_baja_hourhand');
Route::post('baja_hourhand', 'HourhandController@baja_hourhand')->name('baja_hourhand');

/*---------------Controlador Vacaciones-----------------*/
Route::get('Holidays', 'HolidaysController@Holidays')->name('Holidays');
Route::get('obtener_ultimo_id_holidays', 'HolidaysController@obtener_ultimo_id_holidays')->name('obtener_ultimo_id_holidays');
Route::post('guardar_holidays', 'HolidaysController@guardar_holidays')->name('guardar_holidays');
Route::get('listar_holidays', 'HolidaysController@listar_holidays')->name('listar_holidays');
Route::get('obtener_holidays', 'HolidaysController@obtener_holidays')->name('obtener_holidays');
Route::post('modificar_holidays', 'HolidaysController@modificar_holidays')->name('modificar_holidays');
Route::get('verificar_baja_holidays', 'HolidaysController@verificar_baja_holidays')->name('verificar_baja_holidays');
Route::post('baja_holidays', 'HolidaysController@baja_holidays')->name('baja_holidays');

/*---------------Controlador de Permisos----------------*/
Route::get('Permissions', 'PermissionsController@Permissions')->name('Permissions');
Route::get('obtener_ultimo_id_permissions', 'PermissionsController@obtener_ultimo_id_permissions')->name('obtener_ultimo_id_permissions');
Route::post('guardar_permissions', 'PermissionsController@guardar_permissions')->name('guardar_permissions');
Route::get('listar_permissions', 'PermissionsController@listar_permissions')->name('listar_permissions');
Route::get('obtener_permissions', 'PermissionsController@obtener_permissions')->name('obtener_permissions');
Route::post('modificar_permissions', 'PermissionsController@modificar_permissions')->name('modificar_permissions');
Route::get('verificar_baja_permissions', 'PermissionsController@verificar_baja_permissions')->name('verificar_baja_permissions');
Route::post('baja_permissions', 'PermissionsController@baja_permissions')->name('baja_permissions');

/*----------------Controlador de Empleados----------------*/
Route::get('Employees', 'EmployeesController@Employees')->name('Employees');
Route::get('obtener_ultimo_id_employees', 'EmployeesController@obtener_ultimo_id_employees')->name('obtener_ultimo_id_employees');
Route::post('guardar_employees', 'EmployeesController@guardar_employees')->name('guardar_employees');
Route::get('listar_employees', 'EmployeesController@listar_employees')->name('listar_employees');
Route::get('obtener_employees', 'EmployeesController@obtener_employees')->name('obtener_employees');
Route::post('modificar_employees', 'EmployeesController@modificar_employees')->name('modificar_employees');
Route::get('verificar_baja_employees', 'EmployeesController@verificar_baja_employees')->name('verificar_baja_employees');
Route::post('baja_employees', 'EmployeesController@baja_employees')->name('baja_employees');

/*-----------Controlador de Dias de Vacaciones------------*/
Route::get('Vacationdays', 'VacationdaysController@Vacationdays')->name('Vacationdays');
Route::get('obtener_ultimo_id_vacationdays', 'VacationdaysController@obtener_ultimo_id_vacationdays')->name('obtener_ultimo_id_vacationdays');
Route::post('guardar_vacationdays', 'VacationdaysController@guardar_vacationdays')->name('guardar_vacationdays');
Route::get('listar_vacationdays', 'VacationdaysController@listar_vacationdays')->name('listar_vacationdays');
Route::get('obtener_vacationdays', 'VacationdaysController@obtener_vacationdays')->name('obtener_vacationdays');
Route::post('modificar_vacationdays', 'VacationdaysController@modificar_vacationdays')->name('modificar_vacationdays');
Route::get('verificar_baja_vacationdays', 'VacationdaysController@verificar_baja_vacationdays')->name('verificar_baja_vacationdays');
Route::post('baja_vacationdays', 'VacationdaysController@baja_vacationdays')->name('baja_vacationdays');

/*-----------Controlador de Reporte de Vaciones------------*/
Route::get('Vacationreports', 'VacationreportsController@Vacationreports')->name('Vacationreports');
Route::get('obtener_ultimo_id_vacationreports', 'VacationreportsController@obtener_ultimo_id_vacationreports')->name('obtener_ultimo_id_vacationreports');
Route::post('guardar_vacationreports', 'VacationreportsController@guardar_vacationreports')->name('guardar_vacationreports');
Route::get('listar_vacationreports', 'VacationreportsController@listar_vacationreports')->name('listar_vacationreports');
Route::get('obtener_vacationreports', 'VacationreportsController@obtener_vacationreports')->name('obtener_vacationreports');
Route::post('modificar_vacationreports', 'VacationreportsController@modificar_vacationreports')->name('modificar_vacationreports');
Route::get('verificar_baja_vacationreports', 'VacationreportsController@verificar_baja_vacationreports')->name('verificar_baja_vacationreports');
Route::post('baja_vacationreports', 'VacationreportsController@baja_vacationreports')->name('baja_vacationreports');

/*-----------Controlador de Reporte de Permisos------------*/
Route::get('Permissionsreports', 'PermissionsreportsController@Permissionsreports')->name('Permissionsreports');
Route::get('obtener_ultimo_id_permissionsreports', 'PermissionsreportsController@obtener_ultimo_id_permissionsreports')->name('obtener_ultimo_id_permissionsreports');
Route::post('guardar_permissionsreports', 'PermissionsreportsController@guardar_permissionsreports')->name('guardar_permissionsreports');
Route::get('listar_permissionsreports', 'PermissionsreportsController@listar_permissionsreports')->name('listar_permissionsreports');
Route::get('obtener_permissionsreports', 'PermissionsreportsController@obtener_permissionsreports')->name('obtener_permissionsreports');
Route::post('modificar_permissionsreports', 'PermissionsreportsController@modificar_permissionsreports')->name('modificar_permissionsreports');
Route::get('verificar_baja_permissionsreports', 'PermissionsreportsController@verificar_baja_permissionsreports')->name('verificar_baja_permissionsreports');
Route::post('baja_permissionsreports', 'PermissionsreportsController@baja_permissionsreports')->name('baja_permissionsreports');

/*-----------------Controlador Cerrar Sesion---------------*/
Route::get('Exits', 'ExitsController@Exits')->name('Exits');
Route::get('obtener_ultimo_id_exits', 'ExitsController@obtener_ultimo_id_exits')->name('obtener_ultimo_id_exits');
Route::post('guardar_exits', 'ExitsController@guardar_exits')->name('guardar_exits');
Route::get('listar_exits', 'ExitsController@listar_exits')->name('listar_exits');
Route::get('obtener_exits', 'ExitsController@obtener_exits')->name('obtener_exits');
Route::post('modificar_exits', 'ExitsController@modificar_exits')->name('modificar_exits');
Route::get('verificar_baja_exits', 'ExitsController@verificar_baja_exits')->name('verificar_baja_exits');
Route::post('baja_exits', 'ExitsController@baja_exits')->name('baja_exits');

/*--------------------Controlador Nomina-------------------*/
Route::get('Nominas', 'NominasController@Nominas')->name('Nominas');
Route::get('obtener_ultimo_id_nominas', 'NominasController@obtener_ultimo_id_nominas')->name('obtener_ultimo_id_nominas');
Route::post('guardar_nominas', 'NominasController@guardar_nominas')->name('guardar_nominas');
Route::get('listar_nominas', 'NominasController@listar_nominas')->name('listar_nominas');
Route::get('obtener_nominas', 'NominasController@obtener_nominas')->name('obtener_nominas');
Route::post('modificar_nominas', 'NominasController@modificar_nominas')->name('modificar_nominas');
Route::get('verificar_baja_nominas', 'NominasController@verificar_baja_nominas')->name('verificar_baja_nominas');
Route::post('baja_nominas', 'NominasController@baja_nominas')->name('baja_nominas');

/*--------------------Controlador Asistencias-------------------*/
Route::get('Assistances', 'AssistancesController@Assistances')->name('Assistances');
Route::get('obtener_ultimo_id_assistances', 'AssistancesController@obtener_ultimo_id_assistances')->name('obtener_ultimo_id_assistances');
Route::post('guardar_assistances', 'AssistancesController@guardar_assistances')->name('guardar_assistances');
Route::get('listar_assistances', 'AssistancesController@listar_assistances')->name('listar_assistances');
Route::get('obtener_assistances', 'AssistancesController@obtener_assistances')->name('obtener_assistances');
Route::post('modificar_assistances', 'AssistancesController@modificar_assistances')->name('modificar_assistances');
Route::get('verificar_baja_assistances', 'AssistancesController@verificar_baja_assistances')->name('verificar_baja_assistances');
Route::post('baja_assistances', 'AssistancesController@baja_assistances')->name('baja_assistances');