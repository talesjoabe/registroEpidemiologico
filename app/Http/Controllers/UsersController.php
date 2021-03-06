<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class UsersController extends Controller
{
    const TYPE_TITULO                   = 1;
    const TYPE_INTRODUCAO_OU_CONCLUSAO  = 2;
    const TYPE_REFERENCIAS              = 3;
    const TYPE_DESENVOLVIMENTO          = 4;
    const TYPE_AGRADECIMENTOS           = 5;
    const TYPE_DEDICATORIA              = 6;
    const TYPE_RESUMO                   = 7;
    const TYPE_APENDICE                 = 8;
    const TYPE_ANEXO                    = 9;
    const TYPE_SUMARIO                  = 10;

    const TYPES = [

        self::TYPE_TITULO                   => 'Título',
        self::TYPE_INTRODUCAO_OU_CONCLUSAO  => 'Introdução/Conclusão',
        self::TYPE_REFERENCIAS              => 'Referências',
        self::TYPE_DESENVOLVIMENTO          => 'Desenvolvimento',
        self::TYPE_AGRADECIMENTOS           => 'Agradecimentos',
        self::TYPE_DEDICATORIA              => 'Dedicatória',
        self::TYPE_RESUMO                   => 'Resumo',
        self::TYPE_APENDICE                 => 'Apêndice',
        self::TYPE_ANEXO                    => 'Anexo',
        self::TYPE_SUMARIO                  => 'Sumário'
    ];

    public function typeLabel()
    {
        return isset(self::TYPES[$this->type]) ? self::TYPES[$this->type] : $this->type;
    }

    public function index()
    {
        $User = User::all();
        return response()->json($User);
    }

    public function store(Request $request)
    {
        $User= new User();
        $User->fill($request->all());
        $User->save();

        return response()->json($User, 201);
    }

    public function update(Request $request, $id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $User->fill($request->all());
        $User->save();

        return response()->json($User);
    }

    public function show($id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($User);
    }

    public function destroy($id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $User->delete();
    }

    public function getGrupo($id){
        $user = User::find($id);

        $current_date = date('Y-m-d');
        $current_date = Carbon::createFromFormat('Y-m-d', $current_date);
        $birth_date = date_create($user->data_de_nascimento);
        $years = $current_date->diffInYears($birth_date);

        $grupo = null;
        if($years>=0 and $years<=18) $grupo = "00-18";
        elseif($years>=19 and $years<=25) $grupo = "19-25";
        elseif($years>=26 and $years<=35) $grupo = "26-35";
        elseif($years>=36 and $years<=50) $grupo = "36-50";
        elseif($years>=51 and $years<=60) $grupo = "51-60";
        elseif($years>=61 and $years<=70) $grupo = "61-70";
        elseif($years>=71 and $years<=80) $grupo = "71-80";
        elseif($years>=81 and $years<=100) $grupo = "81-100";
        else $grupo = null;
        
        return response()->json($grupo);
    }
}
