<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FormaPago;

class FormaPagoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_forma_pago()
    {
        $formaPago = factory(FormaPago::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/forma_pagos', $formaPago
        );

        $this->assertApiResponse($formaPago);
    }

    /**
     * @test
     */
    public function test_read_forma_pago()
    {
        $formaPago = factory(FormaPago::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/forma_pagos/'.$formaPago->id
        );

        $this->assertApiResponse($formaPago->toArray());
    }

    /**
     * @test
     */
    public function test_update_forma_pago()
    {
        $formaPago = factory(FormaPago::class)->create();
        $editedFormaPago = factory(FormaPago::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/forma_pagos/'.$formaPago->id,
            $editedFormaPago
        );

        $this->assertApiResponse($editedFormaPago);
    }

    /**
     * @test
     */
    public function test_delete_forma_pago()
    {
        $formaPago = factory(FormaPago::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/forma_pagos/'.$formaPago->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/forma_pagos/'.$formaPago->id
        );

        $this->response->assertStatus(404);
    }
}
