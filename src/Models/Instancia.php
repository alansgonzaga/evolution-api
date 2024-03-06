<?php

namespace Alansgonzaga\EvolutionApi\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Instancia
{
    /**
     * Permite especificar um nome qualquer para fácil identificação da conta conectada (instância)
     * @var string
     */
    public string $instanceName;

    /**
     * Permite especificar um token único qualquer para linkar com a instância
     * @var string
     */
    public string $apiKey = ''; // Como pré-preencher um randômico?

    // public bool $listenWebhooks = config('evolution.webhook_enabled', false);

    public function criarInstancia()
    {
        $client = new Client();

        $headers = [
            'Content-Type' => 'application/json',
            'apikey' => config('evolution.apikey')
        ];

        $body = [
            "instanceName" => $this->instanceName,
            "token" => $this->apiKey,
            "qrcode" => true
        ];

        // if($this->listenWebhooks) {
        //     $body = array_merge($body,
        //         [
        //             "webhook" => config('evolution.webhookUrl'),
        //             "webhook_by_events" => false,
        //             "events" => [
        //                 // "APPLICATION_STARTUP",
        //                 "QRCODE_UPDATED",
        //                 // "MESSAGES_SET",
        //                 "MESSAGES_UPSERT",
        //                 "MESSAGES_UPDATE",
        //                 "MESSAGES_DELETE",
        //                 "SEND_MESSAGE",
        //                 // "CONTACTS_SET",
        //                 // "CONTACTS_UPSERT",
        //                 // "CONTACTS_UPDATE",
        //                 // "PRESENCE_UPDATE",
        //                 // "CHATS_SET",
        //                 // "CHATS_UPSERT",
        //                 // "CHATS_UPDATE",
        //                 // "CHATS_DELETE",
        //                 // "GROUPS_UPSERT",
        //                 // "GROUP_UPDATE",
        //                 // "GROUP_PARTICIPANTS_UPDATE",
        //                 "CONNECTION_UPDATE",
        //                 "CALL"
        //                 // "NEW_JWT_TOKEN",
        //                 // "TYPEBOT_START",
        //                 // "TYPEBOT_CHANGE_STATUS",
        //             ]
        //         ]
        //     );
        // }

        $request = new Request('POST', 'https://localhost:8080/instance/create', $headers, json_encode($body));
        $res = $client->sendAsync($request)->wait();

        dd($res->getBody());
    }
}