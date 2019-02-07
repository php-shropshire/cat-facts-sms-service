<?php
namespace App\Commands;

use App\Services\ClockworkService;
use App\Services\KafkaService;
use Symfony\Component\Console\Output\OutputInterface;

class ConsumeNewSubscribers
{
    /**
     * @var KafkaService
     */
    private $kafkaService;

    /**
     * @var ClockworkService
     */
    private $clockworkService;

    public function __construct(KafkaService $kafkaService, ClockworkService $clockworkService)
    {
        $this->kafkaService = $kafkaService;
        $this->clockworkService = $clockworkService;
    }

    public function __invoke(OutputInterface $output)
    {
        $output->writeln("Consuming events!");

        $this->kafkaService->consume('cat_fact_subscribe', function ($payload) use ($output) {
            $output->writeln('Sending text');
            $this->clockworkService->sendText($payload['number'], 'You are now subscribed to cat facts');
        });
    }
}