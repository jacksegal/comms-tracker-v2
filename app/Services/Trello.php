<?php

namespace App\ServicesComms;

use GuzzleHttp\Client;
use Carbon\Carbon;


class Trello
{
    private $auth;
    private $client;
    private $listId;

    public function __construct()
    {
        $this->auth = [
            'key' => env('TRELLO_KEY'),
            'token' => env('TRELLO_TOKEN'),
        ];
        $this->auth['baseUrl'] = env('TRELLO_BASE_URL');
        $this->listId = env('TRELLO_LIST_ID');
        $this->client = new Client();
    }

    private function returnBody($res)
    {
        return \GuzzleHttp\json_decode($res->getBody());
    }

    public function createCard($name, $desc, $due)
    {

        try {
       
            $dt = new Carbon($due);

            $res = $this->client->post($this->auth['baseUrl'] . 'cards/', [
                'query' => [
                    'idList' => $this->listId,
                    'name' => $name,
                    'desc' => $desc,
                    'due' => $dt->toIso8601String(),
                    'key' => $this->auth['key'],
                    'token' => $this->auth['token'],
                ]
            ]);

            $result['code'] = $res->getStatusCode();

            $result['body'] = $this->returnBody($res);

            return $result;

        } catch (\GuzzleHttp\Exception\RequestException $e) {

            $response = $e->getResponse();

            $result['code'] = $response->getStatusCode();
            $result['body'] = $response->getBody()->getContents();

            return $result;        
        } 
    }

    public function updateCard($id, $name, $desc, $due)
    {
        try { 
            $dt = new Carbon($due);

            $res = $this->client->put($this->auth['baseUrl'] . 'cards/' . $id, [
                'query' => [
                    'name' => $name,
                    'desc' => $desc,
                    'due' => $dt->toIso8601String(),
                    'key' => $this->auth['key'],
                    'token' => $this->auth['token'],
                ]
            ]);

            $result['code'] = $res->getStatusCode();
            $result['body'] = $this->returnBody($res);

            return $result;
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {

            $response = $e->getResponse();

            $result['code'] = $response->getStatusCode();
            $result['body'] = $response->getBody()->getContents();

            return $result;        
        }  

    }

    public function archiveCard($id)
    {
        try {
            $res = $this->client->put($this->auth['baseUrl'] . 'cards/' . $id, [
                'query' => [
                    'closed' => 'true',
                    'key' => $this->auth['key'],
                    'token' => $this->auth['token'],
                ]
            ]);

            $result['code'] = $res->getStatusCode();
            $result['body'] = $this->returnBody($res);

            return $result;
            

        } catch(\GuzzleHttp\Exception\RequestException $e) {

            $response = $e->getResponse();

            $result['code'] = $response->getStatusCode();
            $result['body'] = $response->getBody()->getContents();

            return $result;  
        }
    }
}