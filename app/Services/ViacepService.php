<?php

namespace App\Services;

class ViacepServices
{
    public function __construct(private string $cep)
    {
        
    }

    public function getLocation(): array
    {
        $response = Http::get("viacep.com.br/ws/{$this->cep}/json/");
    }
}