<?php

namespace App\Http\Controllers\Api;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentoResource;
use App\Http\Resources\DocumentoCollection;
use App\Http\Requests\DocumentoStoreRequest;
use App\Http\Requests\DocumentoUpdateRequest;

class DocumentosController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search', '');

        $documentos = Documento::search($search)
            ->latest()
            ->paginate();

        return new DocumentoCollection($documentos);
    }

    /**
     * @param \App\Http\Requests\DocumentoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoStoreRequest $request)
    {

        $validated = $request->validated();

        $documento = Documento::create($validated);

        return new DocumentoResource($documento);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Documento $documento)
    {


        return new DocumentoResource($documento);
    }

    /**
     * @param \App\Http\Requests\DocumentoUpdateRequest $request
     * @param \App\Models\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function update(
        DocumentoUpdateRequest $request,
        Documento $documento
    ) {

        $validated = $request->validated();

        $documento->update($validated);

        return new DocumentoResource($documento);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Documento $documento)
    {

        $documento->delete();

        return response()->noContent();
    }
}
