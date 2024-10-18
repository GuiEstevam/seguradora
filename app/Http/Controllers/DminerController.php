<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class DminerController extends Controller
{
    public function addRegister(Request $request)
    {
        // Verificar cabeçalhos de autenticação
        $cnpj = $request->header('CNPJ');
        $user = $request->header('USER');
        $password = $request->header('PASSWORD');

        if (!$cnpj || !$user || !$password) {
            return Response::json(['message' => 'ERRO - Cabeçalhos de autenticação ausentes.'], 401);
        }

        // Validação dos cabeçalhos (exemplo simples, ajuste conforme necessário)
        if ($cnpj !== 'seu_cnpj' || $user !== 'seu_usuario' || $password !== 'sua_senha') {
            return Response::json(['message' => 'ERRO - Autenticação falhou.'], 403);
        }

        // Processar o JSON recebido
        $json = $request->getContent();
        try {
            $data = json_decode($json, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('JSON em formato incorreto');
            }

            // Processar os dados conforme necessário
            // Exemplo: Logar os dados recebidos
            Log::info('Dados recebidos: ' . print_r($data, true));

            // Retornar confirmação de recebimento dos dados
            return Response::json(['message' => 'Solicitação de análise registrada com sucesso'], 200);
        } catch (\Exception $e) {
            // Retornar erro se o JSON estiver incorreto
            return Response::json(['message' => 'ERRO - JSON em formato incorreto, por favor verifique o arquivo de envio.'], 400);
        }
    }
}
