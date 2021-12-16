<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Documento;

use App\Models\Expediente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentoTest extends TestCase
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
    public function it_gets_documentos_list()
    {
        $documentos = Documento::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.documentos.index'));

        $response->assertOk()->assertSee($documentos[0]->path);
    }

    /**
     * @test
     */
    public function it_stores_the_documento()
    {
        $data = Documento::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.documentos.store'), $data);

        $this->assertDatabaseHas('documentos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_documento()
    {
        $documento = Documento::factory()->create();

        $expediente = Expediente::factory()->create();

        $data = [
            'path' => $this->faker->text(255),
            'tipo' => $this->faker->text(50),
            'expediente_id' => $expediente->id,
        ];

        $response = $this->putJson(
            route('api.documentos.update', $documento),
            $data
        );

        $data['id'] = $documento->id;

        $this->assertDatabaseHas('documentos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_documento()
    {
        $documento = Documento::factory()->create();

        $response = $this->deleteJson(
            route('api.documentos.destroy', $documento)
        );

        $this->assertDeleted($documento);

        $response->assertNoContent();
    }
}
