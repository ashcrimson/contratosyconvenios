<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UnidadMonetaria;

class UnidadMonetariaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_unidad_monetaria()
    {
        $unidadMonetaria = factory(UnidadMonetaria::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/unidad_monetarias', $unidadMonetaria
        );

        $this->assertApiResponse($unidadMonetaria);
    }

    /**
     * @test
     */
    public function test_read_unidad_monetaria()
    {
        $unidadMonetaria = factory(UnidadMonetaria::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/unidad_monetarias/'.$unidadMonetaria->id
        );

        $this->assertApiResponse($unidadMonetaria->toArray());
    }

    /**
     * @test
     */
    public function test_update_unidad_monetaria()
    {
        $unidadMonetaria = factory(UnidadMonetaria::class)->create();
        $editedUnidadMonetaria = factory(UnidadMonetaria::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/unidad_monetarias/'.$unidadMonetaria->id,
            $editedUnidadMonetaria
        );

        $this->assertApiResponse($editedUnidadMonetaria);
    }

    /**
     * @test
     */
    public function test_delete_unidad_monetaria()
    {
        $unidadMonetaria = factory(UnidadMonetaria::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/unidad_monetarias/'.$unidadMonetaria->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/unidad_monetarias/'.$unidadMonetaria->id
        );

        $this->response->assertStatus(404);
    }
}
