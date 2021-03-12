<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class TransparenciaController extends Controller
{
    public function byDoenca()
    {
       $query = DB::table('usuario_doencas')
           -> join('doencas','doencas.id','=','usuario_doencas.doenca_id')
            -> selectRaw('count(usuario_doencas.id) as Quantidade, doencas.*')
            -> groupBy('usuario_doencas.doenca_id')->get();


        return response()->json($query);
    }

    public function byDoenca_UF()
    {
        $query = DB::table('usuario_doencas')
            -> join('doencas','doencas.id','=','usuario_doencas.doenca_id')
            -> join('users', 'users.id','=', 'usuario_doencas.usuario_id')
            -> join('municipios', 'municipios.id','=', 'users.municipio_id')
            -> join('estados', 'estados.id','=', 'municipios.estado_id')
            -> selectRaw('count(usuario_doencas.id) as Quantidade, doencas.*, estados.*')
            -> groupBy('usuario_doencas.doenca_id')
            -> groupBy('estados.id')
            -> get();

        return response()->json($query);
    }

    public function byDoenca_Gender()
    {
        $query = DB::table('usuario_doencas')
            -> join('doencas','doencas.id','=','usuario_doencas.doenca_id')
            -> join('users', 'users.id','=', 'usuario_doencas.usuario_id')
            -> selectRaw('count(usuario_doencas.id) as Quantidade, doencas.*, users.sexo')
            -> groupBy('usuario_doencas.doenca_id')
            -> groupBy('users.sexo')
            -> get();

        return response()->json($query);
    }

    public function byDoenca_AgeGroup()
    {
        $query = DB::table('usuario_doencas')
            -> join('doencas','doencas.id','=','usuario_doencas.doenca_id')
            -> join('users', 'users.id','=', 'usuario_doencas.usuario_id')
            -> selectRaw(DB::raw('TIMESTAMPDIFF(YEAR, users.data_de_nascimento, CURDATE()) as Age').' ,count(usuario_doencas.id) as Quantidade, doencas.*')
            -> groupBy('usuario_doencas.doenca_id')
            -> groupBy('Age')
            -> get();

        return response()->json($query);
    }

    public function group(){
        $query = DB::table('usuario_doencas')
            -> join('doencas','doencas.id','=','usuario_doencas.doenca_id')
            -> join('users', 'users.id','=', 'usuario_doencas.usuario_id')
            -> join('municipios', 'municipios.id','=', 'users.municipio_id')
            -> join('estados', 'estados.id','=', 'municipios.estado_id')
            -> selectRaw(DB::raw('TIMESTAMPDIFF(YEAR, users.data_de_nascimento, CURDATE()) as Age').' ,count(usuario_doencas.id) as Quantidade, doencas.*, users.sexo, estados.*,municipios.*')
            -> groupBy('usuario_doencas.doenca_id')
            -> groupBy('estados.id')
            -> groupBy('users.sexo')
            -> groupBy('Age')
            -> groupBy('users.municipio_id')
            -> get();

        return response()->json($query);

    }
}
