<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Expediente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpedienteTest extends TestCase
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
    public function it_gets_expedientes_list()
    {
        $expedientes = Expediente::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.expedientes.index'));

        $response->assertOk()->assertSee($expedientes[0]->nombre);
    }

    /**
     * @test
     */
    public function it_stores_the_expediente()
    {
        $data = Expediente::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.expedientes.store'), $data);

        $this->assertDatabaseHas('expedientes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_expediente()
    {
        $expediente = Expediente::factory()->create();

        $user = User::factory()->create();

        $data = [
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastname,
            'curp' => $this->faker->text(20),
            'ine' => $this->faker->text(20),
            'domicilio' => $this->faker->text,
            'documento' => $this->faker->text(50),
            'beneficiario' => $this->faker->text(100),
            'clabe' => $this->faker->text(15),
            'tipo' => 'Hectareas',
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.expedientes.update', $expediente),
            $data
        );

        $data['id'] = $expediente->id;

        $this->assertDatabaseHas('expedientes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_expediente()
    {
        $expediente = Expediente::factory()->create();

        $response = $this->deleteJson(
            route('api.expedientes.destroy', $expediente)
        );

        $this->assertDeleted($expediente);

        $response->assertNoContent();
    }
}
