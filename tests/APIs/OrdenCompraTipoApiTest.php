<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OrdenCompraTipo;

class OrdenCompraTipoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_orden_compra_tipo()
    {
        $ordenCompraTipo = factory(OrdenCompraTipo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/orden_compra_tipos', $ordenCompraTipo
        );

        $this->assertApiResponse($ordenCompraTipo);
    }

    /**
     * @test
     */
    public function test_read_orden_compra_tipo()
    {
        $ordenCompraTipo = factory(OrdenCompraTipo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/orden_compra_tipos/'.$ordenCompraTipo->id
        );

        $this->assertApiResponse($ordenCompraTipo->toArray());
    }

    /**
     * @test
     */
    public function test_update_orden_compra_tipo()
    {
        $ordenCompraTipo = factory(OrdenCompraTipo::class)->create();
        $editedOrdenCompraTipo = factory(OrdenCompraTipo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/orden_compra_tipos/'.$ordenCompraTipo->id,
            $editedOrdenCompraTipo
        );

        $this->assertApiResponse($editedOrdenCompraTipo);
    }

    /**
     * @test
     */
    public function test_delete_orden_compra_tipo()
    {
        $ordenCompraTipo = factory(OrdenCompraTipo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/orden_compra_tipos/'.$ordenCompraTipo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/orden_compra_tipos/'.$ordenCompraTipo->id
        );

        $this->response->assertStatus(404);
    }
}
