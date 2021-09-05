<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContratoItem;

class ContratoItemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contrato_item()
    {
        $contratoItem = factory(ContratoItem::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contrato_items', $contratoItem
        );

        $this->assertApiResponse($contratoItem);
    }

    /**
     * @test
     */
    public function test_read_contrato_item()
    {
        $contratoItem = factory(ContratoItem::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contrato_items/'.$contratoItem->id
        );

        $this->assertApiResponse($contratoItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_contrato_item()
    {
        $contratoItem = factory(ContratoItem::class)->create();
        $editedContratoItem = factory(ContratoItem::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contrato_items/'.$contratoItem->id,
            $editedContratoItem
        );

        $this->assertApiResponse($editedContratoItem);
    }

    /**
     * @test
     */
    public function test_delete_contrato_item()
    {
        $contratoItem = factory(ContratoItem::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contrato_items/'.$contratoItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contrato_items/'.$contratoItem->id
        );

        $this->response->assertStatus(404);
    }
}
