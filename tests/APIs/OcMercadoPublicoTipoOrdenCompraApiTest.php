<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublicoTipoOrdenCompra;

class OcMercadoPublicoTipoOrdenCompraApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_publico_tipo_orden_compra()
    {
        $ocMercadoPublicoTipoOrdenCompra = factory(OcMercadoPublicoTipoOrdenCompra::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_publico_tipo_orden_compras', $ocMercadoPublicoTipoOrdenCompra
        );

        $this->assertApiResponse($ocMercadoPublicoTipoOrdenCompra);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_publico_tipo_orden_compra()
    {
        $ocMercadoPublicoTipoOrdenCompra = factory(OcMercadoPublicoTipoOrdenCompra::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_orden_compras/'.$ocMercadoPublicoTipoOrdenCompra->id
        );

        $this->assertApiResponse($ocMercadoPublicoTipoOrdenCompra->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_publico_tipo_orden_compra()
    {
        $ocMercadoPublicoTipoOrdenCompra = factory(OcMercadoPublicoTipoOrdenCompra::class)->create();
        $editedOcMercadoPublicoTipoOrdenCompra = factory(OcMercadoPublicoTipoOrdenCompra::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_publico_tipo_orden_compras/'.$ocMercadoPublicoTipoOrdenCompra->id,
            $editedOcMercadoPublicoTipoOrdenCompra
        );

        $this->assertApiResponse($editedOcMercadoPublicoTipoOrdenCompra);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_publico_tipo_orden_compra()
    {
        $ocMercadoPublicoTipoOrdenCompra = factory(OcMercadoPublicoTipoOrdenCompra::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_publico_tipo_orden_compras/'.$ocMercadoPublicoTipoOrdenCompra->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_tipo_orden_compras/'.$ocMercadoPublicoTipoOrdenCompra->id
        );

        $this->response->assertStatus(404);
    }
}
