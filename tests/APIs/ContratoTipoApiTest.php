<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContratoTipo;

class ContratoTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contrato_tipo()
    {
        $contratoTipo = factory(ContratoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contrato_tipos', $contratoTipo
        );

        $this->assertApiResponse($contratoTipo);
    }

    /**
     * @test
     */
    public function test_read_contrato_tipo()
    {
        $contratoTipo = factory(ContratoTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contrato_tipos/'.$contratoTipo->id
        );

        $this->assertApiResponse($contratoTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_contrato_tipo()
    {
        $contratoTipo = factory(ContratoTipo::class)->create();
        $editedContratoTipo = factory(ContratoTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contrato_tipos/'.$contratoTipo->id,
            $editedContratoTipo
        );

        $this->assertApiResponse($editedContratoTipo);
    }

    /**
     * @test
     */
    public function test_delete_contrato_tipo()
    {
        $contratoTipo = factory(ContratoTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contrato_tipos/'.$contratoTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contrato_tipos/'.$contratoTipo->id
        );

        $this->response->assertStatus(404);
    }
}
