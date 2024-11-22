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
    function translateStatus($status)
    {
        $statusTranslations = [
            'pending' => 'Pendente',
            'approved' => 'Aprovado',
            'denied' => 'Negado',
        ];

        return $statusTranslations[$status] ?? $status;
    }
}

if (!function_exists('statusBox')) {
    function statusBox($status)
    {
        $statusMap = [
            'pending' => [
                'class' => 'status-box pending',
                'icon' => 'hand-right-outline',
                'text' => 'Pendente',
            ],
            'approved' => [
                'class' => 'status-box approved',
                'icon' => 'checkmark-circle-outline',
                'text' => 'Aprovado',
            ],
            'denied' => [
                'class' => 'status-box denied',
                'icon' => 'alert-circle-outline',
                'text' => 'Negado',
            ],
        ];

        if (array_key_exists($status, $statusMap)) {
            return sprintf(
                '<div class="%s"><ion-icon name="%s"></ion-icon> %s</div>',
                $statusMap[$status]['class'],
                $statusMap[$status]['icon'],
                $statusMap[$status]['text']
            );
        }

        return '';
    }
}

function formatRg($rg)
{
    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{1})/", "$1.$2.$3-$4", $rg);
}

if (!function_exists('typeFormat')) {
    function typeFormat($type)
    {
        $typeMap = [
            'aggregated' => 'Agregado',
            'autonomous' => 'Autônomo',
            'fleet' => 'Frota',
            'vehicle' => 'Veículo',
            'individual' => 'driverLicense',
        ];

        return $typeMap[$type] ?? $type;
    }
}
