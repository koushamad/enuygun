<?php

namespace App\Domain\Command;

use App\Application\Service\Contract\TaskServiceContract;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class RegisterTasksCommend
 * @package App\Domain\Command
 */
class RegisterTasksCommend extends Command
{
    /** @var TaskServiceContract $taskService */
    private $taskService;

    /** @var string */
    protected static $defaultName = 'adapter:register-tasks';

    /**
     * RegisterTasksCommend constructor.
     * @param string|null $name
     * @param TaskServiceContract $taskService
     */
    public function __construct(TaskServiceContract $taskService, string $name = null)
    {
        $this->taskService = $taskService;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Register Tasks Commend')
            ->setHelp('This command allows you to register task');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->taskService->registerTasks();

        $output->writeln(['Task Registered']);


        return 0;
    }

}