<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublico;

class OcMercadoPublicoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_publico()
    {
        $ocMercadoPublico = factory(OcMercadoPublico::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_publicos', $ocMercadoPublico
        );

        $this->assertApiResponse($ocMercadoPublico);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_publico()
    {
        $ocMercadoPublico = factory(OcMercadoPublico::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publicos/'.$ocMercadoPublico->id
        );

        $this->assertApiResponse($ocMercadoPublico->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_publico()
    {
        $ocMercadoPublico = factory(OcMercadoPublico::class)->create();
        $editedOcMercadoPublico = factory(OcMercadoPublico::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_publicos/'.$ocMercadoPublico->id,
            $editedOcMercadoPublico
        );

        $this->assertApiResponse($editedOcMercadoPublico);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_publico()
    {
        $ocMercadoPublico = factory(OcMercadoPublico::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_publicos/'.$ocMercadoPublico->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_publicos/'.$ocMercadoPublico->id
        );

        $this->response->assertStatus(404);
    }
}
