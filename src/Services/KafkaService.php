<?php

namespace App\Services;


class KafkaService
{
    /**
     * @var RdKafka\Consumer
     */
    private $rdKafka;

    function __construct()
    {
        $this->rdKafka = new \RdKafka\Consumer();
        $this->rdKafka->addBrokers("kafka");
    }

    function consume($topic, $callback) {
        $consumer = $this->rdKafka->newTopic($topic);

        $consumer->consumeStart(0, RD_KAFKA_OFFSET_END);
        while (true) {
            $msg = $consumer->consume(0, 1000);

            if (!$msg) {
                continue;
            }

            if ($msg->err == RD_KAFKA_RESP_ERR_NO_ERROR) {
                $payload = json_decode($msg->payload, true);

                $callback($payload);
            }
        }
    }
}