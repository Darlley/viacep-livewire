<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViacepServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_viacep_api_is_woring()
    {
        $cep = '79036030';
        $response = Http::get("viacep.com.br/ws/{$cep}/json/");
        $this->assertSame(200, $response->status());
    }
    public function teste_if_response_is_an_array(){
        $cep = '79036030';
        $response = Http::get("viacep.com.br/ws/{$cep}/json/");
        $this->assertTrue(Arr::accessible($response->json()));
    }
    public function test_if_viacep_service_is_working()
    {
        $cep = '79036030';
        $service = new ViacepService($cep);
        $location = $service->getLocation();
        $this->assertSame($same, $location['cep']);
    }
}
