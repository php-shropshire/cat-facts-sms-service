<?php

namespace App\Services;


class ClockworkService
{

    private $clockwork;

    public function __construct()
    {
        $this->clockwork = new \mediaburst\ClockworkSMS\Clockwork( getenv('CLOCKWORK_API_KEY') );
    }

    public function sendText($number, $text)
    {
        try {
            $message = [
                'to' => $number,
                'message' => $text,
                'from' => 'CatFacts'
            ];

            $result = $this->clockwork->send($message);

            return $result['success'];
        } catch (ClockworkException $e) {
            return false;
        }
    }

}