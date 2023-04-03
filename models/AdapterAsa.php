<?php

class AdapterAsa
{
    function build($payload)
    {
        $channel = $payload["payment"]["externalReference"] ?? '';
        $channel = explode('_', $channel)[0];
        return [
            "channel" => $channel,
            "body" => json_encode($payload),
            "date" => date('Y-m-d')
        ];
    }
}
