<?php
namespace App\Commands;

use Symfony\Component\Console\Output\OutputInterface;

class ConsumeNewSubscribers
{
    public function __invoke(OutputInterface $output)
    {
        // TODO Connect to kafka topic here!
        $output->writeln("Consuming events!");
    }
}