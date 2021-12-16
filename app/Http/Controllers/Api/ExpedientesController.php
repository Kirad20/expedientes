<?php

namespace App\Http\Controllers\Api;

use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedienteResource;
use App\Http\Resources\ExpedienteCollection;
use App\Http\Requests\ExpedienteStoreRequest;
use App\Http\Requests\ExpedienteUpdateRequest;
use Illuminate\Support\Facades\DB;

class ExpedientesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getYears = $request->input('getYears',false);
        $anio = $request->input('anio',null);
        $mes = $request->input('mes',null);
        if($getYears){
            return Expediente::select(DB::raw('YEAR(created_at) as year'))->distinct()->get();
        }

        $expedientes = Expediente::query();

        if ($anio) {
           $expedientes->whereYear('created_at',$anio);
        }
        if($mes){
            $expedientes->whereMonth('created_at',$mes);
        }


        return new ExpedienteCollection($expedientes->get());
    }

    /**
     * @param \App\Http\Requests\ExpedienteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpedienteStoreRequest $request)
    {

        $validated = $request->validated();

        $expediente = Expediente::create($validated);

        return new ExpedienteResource($expediente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Expediente $expediente)
    {

        return new ExpedienteResource($expediente);
    }

    /**
     * @param \App\Http\Requests\ExpedienteUpdateRequest $request
     * @param \App\Models\Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(
        ExpedienteUpdateRequest $request,
        Expediente $expediente
    ) {

        $validated = $request->validated();

        $expediente->update($validated);

        return new ExpedienteResource($expediente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expediente $expediente)
    {

        $expediente->delete();

        return response()->noContent();
    }
}
