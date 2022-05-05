<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DespachoTipo;

class DespachoTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_despacho_tipo()
    {
        $despachoTipo = factory(DespachoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/despacho_tipos', $despachoTipo
        );

        $this->assertApiResponse($despachoTipo);
    }

    /**
     * @test
     */
    public function test_read_despacho_tipo()
    {
        $despachoTipo = factory(DespachoTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/despacho_tipos/'.$despachoTipo->id
        );

        $this->assertApiResponse($despachoTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_despacho_tipo()
    {
        $despachoTipo = factory(DespachoTipo::class)->create();
        $editedDespachoTipo = factory(DespachoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/despacho_tipos/'.$despachoTipo->id,
            $editedDespachoTipo
        );

        $this->assertApiResponse($editedDespachoTipo);
    }

    /**
     * @test
     */
    public function test_delete_despacho_tipo()
    {
        $despachoTipo = factory(DespachoTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/despacho_tipos/'.$despachoTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/despacho_tipos/'.$despachoTipo->id
        );

        $this->response->assertStatus(404);
    }
}
