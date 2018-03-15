<?php

namespace App\ServicesComms;

use GuzzleHttp\Client;
use Carbon\Carbon;

/*
    $config = [
        'key' => '7612fffc758bdfcdc596eb383bd8e017',
        'token' => '1e7f33b9448fcba17bcd95db20d374fe8a06616f9f8852992c59edc7f98cc024',
    ];

    $html = view('trello', [
        'email' => 'segal_jack@yahoo.com',
        'ask' => 'hello & good bye & hello again',
    ])->render();

    $trello = new Trello($config);
    $res = $trello->updateCard('5979e308d95a68976e5310aa', 'Jack Test', $html, '2017-10-04');
    $res = $trello->createCard('Create Test', $html, '2017-10-06');
    return response()->json([
        \GuzzleHttp\json_decode($res->getBody())
    ]);
*/


class Trello
{
    private $auth;
    private $client;
    private $listId;

    public function __construct()
    {
        $this->auth = [
            'key' => '7612fffc758bdfcdc596eb383bd8e017',
            'token' => '1e7f33b9448fcba17bcd95db20d374fe8a06616f9f8852992c59edc7f98cc024',
        ];
        $this->auth['baseUrl'] = 'https://api.trello.com/1/';
        $this->listId = '5979e210343c995cca3201f8';
        $this->client = new Client();
    }

    private function returnBody($res)
    {
        return \GuzzleHttp\json_decode($res->getBody());
    }

    public function createCard($name, $desc, $due)
    {
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

        return $this->returnBody($res);
    }

    public function updateCard($id, $name, $desc, $due)
    {
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

        return $this->returnBody($res);
    }


}