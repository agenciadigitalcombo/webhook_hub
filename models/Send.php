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
        try {
            // $content = json_encode($payload, JSON_UNESCAPED_UNICODE);
            // $options = [
            //     CURLOPT_POST           => true,
            //     CURLOPT_HEADER         => true,
            //     CURLOPT_RETURNTRANSFER => 1,
            //     CURLOPT_URL            => $path,
            //     CURLOPT_POSTFIELDS     => $content,
            //     CURLOPT_HTTPHEADER     => $this->header,
            //     // CURLOPT_NOBODY         => true,
            //     // CURLOPT_TIMEOUT        => 10,
            //     // CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)")',
            //     // CURLOPT_SSL_VERIFYHOST => false,
            //     // CURLOPT_SSL_VERIFYPEER => false,
            // ];
            // $con = curl_init();
            // curl_setopt_array($con, $options);
            // $response = curl_exec($con);
            // $http_code = curl_getinfo($con, CURLINFO_HTTP_CODE);
            // curl_close($con);

            $http_code = 200;
            $ch = curl_init($path);
            $payload = json_encode($payload);
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            return [
                "status" => $http_code,
                "response" => $response
            ];
        } catch (\Throwable $th) {
            return [
                "status" => 007,
                "response" => ''
            ];
        }
    }
}
