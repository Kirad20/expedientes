<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedienteResource;
use App\Http\Resources\ExpedienteCollection;

class UsersExpedientesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $expedientes = $user
            ->expedientes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ExpedienteCollection($expedientes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Expediente::class);

        $validated = $request->validate([
            'nombre' => ['required', 'max:50', 'string'],
            'apellido' => ['required', 'max:50', 'string'],
            'curp' => ['required', 'max:20', 'string'],
            'ine' => ['required', 'max:20', 'string'],
            'domicilio' => ['required', 'max:255', 'string'],
            'documento' => ['required', 'max:50', 'string'],
            'beneficiario' => ['required', 'max:100', 'string'],
            'clabe' => ['required', 'max:15', 'string'],
            'tipo' => ['required', 'in:plantas,hectareas'],
            'total' => ['required', 'numeric'],
        ]);

        $expediente = $user->expedientes()->create($validated);

        return new ExpedienteResource($expediente);
    }
}
