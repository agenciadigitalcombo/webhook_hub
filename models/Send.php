<?php

class Send
{

    function __construct()
    {
        $this->header = [
            "content-type: application/json",
        ];
    }

    public function send(array $payload, string $path)
    {
        $content = json_encode($payload, JSON_UNESCAPED_UNICODE);
        try {
            $options = [
                CURLOPT_POST           => true,
                CURLOPT_HEADER         => true,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL            => $path,
                CURLOPT_POSTFIELDS     => $content,
                CURLOPT_HTTPHEADER     => $this->header,
                CURLOPT_NOBODY         => true,
                CURLOPT_TIMEOUT        => 10
            ];
            $con = curl_init();
            curl_setopt_array($con, $options);
            $response = curl_exec($con);
            $http_code = curl_getinfo($con, CURLINFO_HTTP_CODE);
            curl_close($con);
            return $http_code;
        } catch (\Throwable $th) {
            return 007;
        }
    }
}
