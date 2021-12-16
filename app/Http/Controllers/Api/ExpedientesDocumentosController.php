<?php

namespace App\Http\Controllers\Api;

use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentoResource;
use App\Http\Resources\DocumentoCollection;

class ExpedientesDocumentosController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Expediente $expediente)
    {

        $search = $request->get('search', '');

        $documentos = $expediente
            ->documentos()
            ->search($search)
            ->latest()
            ->paginate();

        return new DocumentoCollection($documentos);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Expediente $expediente
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Expediente $expediente)
    {

        $validated = $request->validate([
            'tipo' => ['required', 'max:50', 'string'],
        ]);

        $documento = $expediente->documentos()->create($validated);

        return new DocumentoResource($documento);
    }
}
