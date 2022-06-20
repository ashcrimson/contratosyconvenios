<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublicoTipoDespacho;

class OcMercadoPublicoTipoDespachoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_publico_tipo_despacho()
    {
        $ocMercadoPublicoTipoDespacho = factory(OcMercadoPublicoTipoDespacho::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_publico_tipo_despachos', $ocMercadoPublicoTipoDespacho
        );

        $this->assertApiResponse($ocMercadoPublicoTipoDespacho);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_publico_tipo_despacho()
    {
        $ocMercadoPublicoTipoDespacho = factory(OcMercadoPublicoTipoDespacho::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_despachos/'.$ocMercadoPublicoTipoDespacho->id
        );

        $this->assertApiResponse($ocMercadoPublicoTipoDespacho->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_publico_tipo_despacho()
    {
        $ocMercadoPublicoTipoDespacho = factory(OcMercadoPublicoTipoDespacho::class)->create();
        $editedOcMercadoPublicoTipoDespacho = factory(OcMercadoPublicoTipoDespacho::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_publico_tipo_despachos/'.$ocMercadoPublicoTipoDespacho->id,
            $editedOcMercadoPublicoTipoDespacho
        );

        $this->assertApiResponse($editedOcMercadoPublicoTipoDespacho);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_publico_tipo_despacho()
    {
        $ocMercadoPublicoTipoDespacho = factory(OcMercadoPublicoTipoDespacho::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_publico_tipo_despachos/'.$ocMercadoPublicoTipoDespacho->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_despachos/'.$ocMercadoPublicoTipoDespacho->id
        );

        $this->response->assertStatus(404);
    }
}
