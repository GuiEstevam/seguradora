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
