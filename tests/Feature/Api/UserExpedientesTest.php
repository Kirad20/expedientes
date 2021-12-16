<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Expediente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserExpedientesTest extends TestCase
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
    public function it_gets_user_expedientes()
    {
        $user = User::factory()->create();
        $expedientes = Expediente::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.expedientes.index', $user));

        $response->assertOk()->assertSee($expedientes[0]->nombre);
    }

    /**
     * @test
     */
    public function it_stores_the_user_expedientes()
    {
        $user = User::factory()->create();
        $data = Expediente::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.expedientes.store', $user),
            $data
        );

        $this->assertDatabaseHas('expedientes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $expediente = Expediente::latest('id')->first();

        $this->assertEquals($user->id, $expediente->user_id);
    }
}
