<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ResultUnifiedSerializer;

class DminerController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Verifica se o token de autorização está presente e é válido
        $authorization = $request->header('authorization');
        if ($authorization !== 'token') {
            return response()->json(['message' => 'ERRO - Tentativa de acesso não autorizada, por favor verifique o token de autorização.'], 403);
        }

        try {
            // Cria um novo objeto baseado nos dados recebidos pelo JSON
            $data = $request->json()->all();
            $serializedResponse = ResultUnifiedSerializer::fromArray($data);

            // Processa os dados recebidos
            if (!empty($serializedResponse->resultsDVeiculos)) {
                Log::info("ANTT Response: " . $serializedResponse->resultsDVeiculos[0]->anttResponse);
            }

            // Confirmação do recebimento dos dados
            return response()->json(['message' => 'Análise recebida com sucesso.']);
        } catch (\Exception $e) {
            // Caso não seja possível construir a classe porque o json recebido apresenta erro
            return response()->json(['message' => 'ERRO - JSON em formato incorreto, por favor verifique o arquivo de envio.'], 400);
        }
    }
}
