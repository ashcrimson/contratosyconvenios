<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublicoItem;

class OcMercadoPublicoItemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_publico_item()
    {
        $ocMercadoPublicoItem = factory(OcMercadoPublicoItem::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_publico_items', $ocMercadoPublicoItem
        );

        $this->assertApiResponse($ocMercadoPublicoItem);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_publico_item()
    {
        $ocMercadoPublicoItem = factory(OcMercadoPublicoItem::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_items/'.$ocMercadoPublicoItem->id
        );

        $this->assertApiResponse($ocMercadoPublicoItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_publico_item()
    {
        $ocMercadoPublicoItem = factory(OcMercadoPublicoItem::class)->create();
        $editedOcMercadoPublicoItem = factory(OcMercadoPublicoItem::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_publico_items/'.$ocMercadoPublicoItem->id,
            $editedOcMercadoPublicoItem
        );

        $this->assertApiResponse($editedOcMercadoPublicoItem);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_publico_item()
    {
        $ocMercadoPublicoItem = factory(OcMercadoPublicoItem::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_publico_items/'.$ocMercadoPublicoItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publico_items/'.$ocMercadoPublicoItem->id
        );

        $this->response->assertStatus(404);
    }
}
