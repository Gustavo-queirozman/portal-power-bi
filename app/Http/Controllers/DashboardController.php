<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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



    public function index(Request $request){
       
        $versao = $request->input('versao');
        $setor = $request->input('setor');

        if($setor == "faturamento"){
            //dashboard anterior
            if($versao == "anterior"){
                return view('dashboard')->with('urlPowerBi','https://powerbi.faturamento/anterior');
            }

            //dashboard nova
            return view('dashboard')->with('urlPowerBi','https://powerbi.faturamento/nova');
        }

        if($setor == "venda"){
            //dashboard anterior
            if($versao == "anterior"){
                return view('dashboard')->with('urlPowerBi','https://powerbi.vendas/anterior');
            }

            //dashboard nova
            return view('dashboard')->with('urlPowerBi','https://powerbi.vendas/nova');
        }
    }

    /*public function venda(Request $request){
        $versao = $request->input('versao');
        return view('dashboard')->with('versao', $versao);
    }*/
}
