<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Licitacion;

class LicitacionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_licitacion()
    {
        $licitacion = factory(Licitacion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/licitaciones', $licitacion
        );

        $this->assertApiResponse($licitacion);
    }

    /**
     * @test
     */
    public function test_read_licitacion()
    {
        $licitacion = factory(Licitacion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/licitaciones/'.$licitacion->id
        );

        $this->assertApiResponse($licitacion->toArray());
    }

    /**
     * @test
     */
    public function test_update_licitacion()
    {
        $licitacion = factory(Licitacion::class)->create();
        $editedLicitacion = factory(Licitacion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/licitaciones/'.$licitacion->id,
            $editedLicitacion
        );

        $this->assertApiResponse($editedLicitacion);
    }

    /**
     * @test
     */
    public function test_delete_licitacion()
    {
        $licitacion = factory(Licitacion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/licitaciones/'.$licitacion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/licitaciones/'.$licitacion->id
        );

        $this->response->assertStatus(404);
    }
}
