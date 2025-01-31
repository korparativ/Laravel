<?php

namespace App\Services;
use Twilio\Rest\Client as TwilioClient;

class SmsSenderServise implements SmsSenderInterface{
    protected $client;
    public function __construct($sid, $token){
        $this->client = new TwilioClient($sid, $token);
    }
    public function send($message){
        $this->client->messages->create(+79246684095, ['from' => 89853018747, 'body' => 'Test message']);
    }
}
