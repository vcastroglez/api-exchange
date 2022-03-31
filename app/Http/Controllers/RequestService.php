<?php

    namespace App\Http\Controllers;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use Illuminate\Http\Request;

    class RequestService extends Controller {
        //
        public function createRequest($collection_id, $name, $method = null, $uri = null, $params = null, $headers = null, $body = null, $response = null) {
            return \App\Models\Request::create([
                'collection_id' => $collection_id,
                'name' => $name,
                'method' => $method,
                'uri' => $uri,
                'params' => $params,
                'headers' => $headers,
                'body' => $body,
                'response' => $response
                ]);
        }

        public function saveRequest(array $all) {
            $request = \App\Models\Request::find($all['id']);
            $request->name = $all['name'];
            $request->method = $all['method'];
            $request->uri = $all['uri'];
            $request->params = $all['params'];
            $request->headers = $all['headers'];
            $request->body = $all['body'];
            $request->response = $all['response'];
            $request->save();
            return $request;
        }

        public function sendRequest(array $all) {
            $method = $all['method'];
            $uri = $all['uri'];

            $params = http_build_query(self::parseArray($all['params']));
            $headers = self::parseArray($all['headers']);
            $body = json_encode(json_decode($all['body']));
            $jar = new \GuzzleHttp\Cookie\CookieJar();
            $client = new Client(['defaults' => ['config' => ['curl' => [CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2, CURLOPT_SSL_CIPHER_LIST => 'DEFAULT@SECLEVEL=1']]], 'verify' => false, 'cookies' => $jar, 'version' => 1.2]);
            if(!empty($params)) {
                $uri .= '?'.$params;
            }
            try {
                $res = $client->request($method, $uri, ['headers' => $headers, 'body' => $body]);
            } catch(ClientException $exception) {
                $res = $exception->getResponse();
            }
            $response = [];
            $response['contents'] = $res->getBody()->getContents();
            $response['status_code'] = $res->getStatusCode();
            $response['headers'] = $res->getHeaders();
            $response['protocol'] = $res->getProtocolVersion();
            $response['reason_phrase'] = $res->getReasonPhrase();
            $all['response'] = $response;
            return $all;
        }

        public static function parseArray($array) {
            $parsed = [];
            $array = array_filter($array, function($item) {
                return !empty($item['key']) && !empty($item['value']);
            });
            foreach($array as $item) {
                $parsed[$item['key']] = $item['value'];
            }
            return $parsed;
        }

        public function renameRequest($id, $new_name) {
            $requst = \App\Models\Request::find($id);
            $requst->name = $new_name;
            $requst->save();
            return true;
        }
    }
