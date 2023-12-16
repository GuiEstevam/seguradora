<?php

namespace App\Services;

class CnpjFormatterService
{
    public function formatarCnpj($cnpj)
    {
        // Código de formatação aqui
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        $cnpjFormatado =  substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
        return $cnpjFormatado;
    }
}
