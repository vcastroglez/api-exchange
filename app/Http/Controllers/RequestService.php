<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RequestService extends Controller
{
    //
    public function createRequest($collection_id, $name)
    {
        return \App\Models\Request::create([
           'collection_id'=>$collection_id,
           'name'=>$name
        ]);
    }

    public function saveRequest(array $all)
    {
        $request = \App\Models\Request::find($all['id']);
        $request->name  = $all['name'];
        $request->method  = $all['method'];
        $request->uri  = $all['uri'];
        $request->params  = $all['params'];
        $request->headers  = $all['headers'];
        $request->body  = $all['body'];
        $request->response  = $all['response'];
        $request->save();
        return $request;
    }

    public function sendRequest(array $all)
    {
        $method = $all['method'];
        $uri = $all['uri'];

        $params = http_build_query(self::parseArray($all['params']));
        $headers  = self::parseArray($all['headers']);
        $body = json_encode(json_decode($all['body']));
        $client = new Client([
            'defaults' => [
                'config' => [
                    'curl' => [
                        CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
                    ]
                ]
            ]
        ]);
        if(!empty($params)){
            $uri .= '?'.$params;
        }
        $res = $client->request($method,$uri,[
            'headers'=>$headers,
            'body'=>$body
        ]);
        $response = [];
        $response['contents'] = $res->getBody()->getContents();
        $response['status_code'] = $res->getStatusCode();
        $response['headers'] = $res->getHeaders();
        $response['protocol'] = $res->getProtocolVersion();
        $response['reason_phrase'] = $res->getReasonPhrase();
        $all['response'] = $response;
        return $all;
    }

    public static function parseArray($array){
        $parsed = [];
        $array = array_filter($array,function($item){
            return !empty($item['name']) && !empty($item['value']);
        });
        foreach ($array as $item){
            $parsed[$item['name']] = $item['value'];
        }
        return $parsed;
    }
}
