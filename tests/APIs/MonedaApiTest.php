<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Moneda;

class MonedaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_moneda()
    {
        $moneda = factory(Moneda::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/monedas', $moneda
        );

        $this->assertApiResponse($moneda);
    }

    /**
     * @test
     */
    public function test_read_moneda()
    {
        $moneda = factory(Moneda::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/monedas/'.$moneda->id
        );

        $this->assertApiResponse($moneda->toArray());
    }

    /**
     * @test
     */
    public function test_update_moneda()
    {
        $moneda = factory(Moneda::class)->create();
        $editedMoneda = factory(Moneda::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/monedas/'.$moneda->id,
            $editedMoneda
        );

        $this->assertApiResponse($editedMoneda);
    }

    /**
     * @test
     */
    public function test_delete_moneda()
    {
        $moneda = factory(Moneda::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/monedas/'.$moneda->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/monedas/'.$moneda->id
        );

        $this->response->assertStatus(404);
    }
}
