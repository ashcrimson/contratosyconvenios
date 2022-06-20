<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OcMercadoPublicTipoPago;

class OcMercadoPublicTipoPagoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_oc_mercado_public_tipo_pago()
    {
        $ocMercadoPublicTipoPago = factory(OcMercadoPublicTipoPago::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/oc_mercado_public_tipo_pagos', $ocMercadoPublicTipoPago
        );

        $this->assertApiResponse($ocMercadoPublicTipoPago);
    }

    /**
     * @test
     */
    public function test_read_oc_mercado_public_tipo_pago()
    {
        $ocMercadoPublicTipoPago = factory(OcMercadoPublicTipoPago::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_public_tipo_pagos/'.$ocMercadoPublicTipoPago->id
        );

        $this->assertApiResponse($ocMercadoPublicTipoPago->toArray());
    }

    /**
     * @test
     */
    public function test_update_oc_mercado_public_tipo_pago()
    {
        $ocMercadoPublicTipoPago = factory(OcMercadoPublicTipoPago::class)->create();
        $editedOcMercadoPublicTipoPago = factory(OcMercadoPublicTipoPago::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/oc_mercado_public_tipo_pagos/'.$ocMercadoPublicTipoPago->id,
            $editedOcMercadoPublicTipoPago
        );

        $this->assertApiResponse($editedOcMercadoPublicTipoPago);
    }

    /**
     * @test
     */
    public function test_delete_oc_mercado_public_tipo_pago()
    {
        $ocMercadoPublicTipoPago = factory(OcMercadoPublicTipoPago::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/oc_mercado_public_tipo_pagos/'.$ocMercadoPublicTipoPago->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/oc_mercado_public_tipo_pagos/'.$ocMercadoPublicTipoPago->id
        );

        $this->response->assertStatus(404);
    }
}
