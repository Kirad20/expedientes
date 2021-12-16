<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Documento;
use App\Models\Expediente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpedienteDocumentosTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_expediente_documentos()
    {
        $expediente = Expediente::factory()->create();
        $documentos = Documento::factory()
            ->count(2)
            ->create([
                'expediente_id' => $expediente->id,
            ]);

        $response = $this->getJson(
            route('api.expedientes.documentos.index', $expediente)
        );

        $response->assertOk()->assertSee($documentos[0]->path);
    }

    /**
     * @test
     */
    public function it_stores_the_expediente_documentos()
    {
        $expediente = Expediente::factory()->create();
        $data = Documento::factory()
            ->make([
                'expediente_id' => $expediente->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.expedientes.documentos.store', $expediente),
            $data
        );

        $this->assertDatabaseHas('documentos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $documento = Documento::latest('id')->first();

        $this->assertEquals($expediente->id, $documento->expediente_id);
    }
}
