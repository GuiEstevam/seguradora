<?php

if (!function_exists('format_phone')) {
    function format_phone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($phone) == 10 || strlen($phone) == 11) {
            return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, 6);
        }

        return $phone;
    }
}

function formatCpf($cpf)
{
    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}

if (!function_exists('translateStatus')) {
    function Status($status)
    {
        $statusTranslations = [
            'pending' => 'Pendente',
            'accepted' => 'Aceito',
            'refused' => 'Recusado',
        ];

        return $statusTranslations[$status] ?? $status;
    }
}
