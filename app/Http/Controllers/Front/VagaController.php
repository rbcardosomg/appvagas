<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Vaga;
use App\Models\VagaStatus;
use App\Models\VagaTipo;
use Illuminate\Http\Request;

class VagaController extends Controller
{   
    private function getVagas($filtros = null)
    {
        $fil[] = ['vaga_status', VagaStatus::APROVADA];

        if(!is_null($filtros)){
            if(!is_null($filtros['filtro_tipo']) && $filtros['filtro_tipo'] != '')
                $fil[] = ['tipo', $filtros['filtro_tipo']];

            if(!is_null($filtros['filtro_curso']) && $filtros['filtro_curso'] != '')
                $fil[] = ['cursos.id', $filtros['filtro_curso']];
            
        }
        
        $vaga = Vaga::where(function($query) use ($fil){
            foreach ($fil as $filtro) {
                if(sizeof($filtro) > 0){
                    if($filtro[0] === 'cursos.id'){
                        $query->whereHas('cursos', function($query1) use ($filtro){
                            $query1->where($filtro[0],$filtro[1]);
                        });
                    }else{
                        $query->where($filtro[0],$filtro[1]);
                    }
                }
            }
        });
        
        return $vaga->paginate(3);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = $this->getVagas();
        $cursos = Curso::all();
        $tipos = VagaTipo::cases();
        return view('vagas.index', ['vagas'=>$vagas, 'cursos'=>$cursos, 'tipos'=>$tipos]);
    }

    /**
     * Display a listing of the resource filtered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filtrar(Request $request)
    {
        $filtros = $request->all();
        
        if(is_null($filtros) || sizeof($filtros) == 0){
            return redirect()->back();
        }else{
            $vagas = $this->getVagas($filtros);
            $cursos = Curso::all();
            $tipos = VagaTipo::cases();
            return view('vagas.index', ['vagas'=>$vagas, 'cursos'=>$cursos, 'tipos'=>$tipos, 'filtro_tipo'=>$filtros['filtro_tipo'], 'filtro_curso'=>$filtros['filtro_curso']]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaga = Vaga::findOrFail($id);
        return view('vagas.show', ['vaga' => $vaga]);
    }

}