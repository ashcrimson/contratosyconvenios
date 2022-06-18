<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublicoTipoMoneda;

class OcMercadoPublicoTipoMonedaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_publico_tipo_moneda()
    {
        $ocMercadoPublicoTipoMoneda = factory(OcMercadoPublicoTipoMoneda::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_publico_tipo_monedas', $ocMercadoPublicoTipoMoneda
        );

        $this->assertApiResponse($ocMercadoPublicoTipoMoneda);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_publico_tipo_moneda()
    {
        $ocMercadoPublicoTipoMoneda = factory(OcMercadoPublicoTipoMoneda::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_monedas/'.$ocMercadoPublicoTipoMoneda->id
        );

        $this->assertApiResponse($ocMercadoPublicoTipoMoneda->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_publico_tipo_moneda()
    {
        $ocMercadoPublicoTipoMoneda = factory(OcMercadoPublicoTipoMoneda::class)->create();
        $editedOcMercadoPublicoTipoMoneda = factory(OcMercadoPublicoTipoMoneda::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_publico_tipo_monedas/'.$ocMercadoPublicoTipoMoneda->id,
            $editedOcMercadoPublicoTipoMoneda
        );

        $this->assertApiResponse($editedOcMercadoPublicoTipoMoneda);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_publico_tipo_moneda()
    {
        $ocMercadoPublicoTipoMoneda = factory(OcMercadoPublicoTipoMoneda::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_publico_tipo_monedas/'.$ocMercadoPublicoTipoMoneda->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_monedas/'.$ocMercadoPublicoTipoMoneda->id
        );

        $this->response->assertStatus(404);
    }
}
