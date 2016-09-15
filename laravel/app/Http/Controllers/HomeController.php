<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace daf\Http\Controllers;

use daf\User;
use Validador;
use daf\Http\Requests;
use Illuminate\Http\Request;
use daf\Opcion;
use daf\Grupo;
/**
 * Class HomeController
 * @package daf\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        //$opc=Opcion::listar();
        //dd($opc);
        return view('/home');
    }
}