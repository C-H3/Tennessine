<?php declare(strict_types=1);
namespace Tennessine\IPC;

use Tennessine\Constants;
use Tennessine\IPC\Analyze\Analyzer;

/**
 * Controller class for the IPC infrastructure.
 * Should be instantiated once in the lifetime of the process,
 * in the parent process, to be precise and passed down to child
 * threads when started.
 * @package Tennessine\IPC
 */
class Control {
    private const LISTEN_BACKLOG = 32;
    public const IPC_PORT = 19437;

    private $socket;
    private $messageAnalyzer;

    public function __construct() {
        $socket = new \Socket(Constants::AF_INET, Constants::SOCK_STREAM, Constants::SOL_TCP);
        $socket->bind('127.0.0.1', self::IPC_PORT);
        $this->socket = $socket;
        $this->messageAnalyzer = new Analyzer();
    }

    /**
     * Method should be called in a separate thread, since it blocks I/O.
     * @return void
     */
    public function start(): void {
        $this->socket->listen(self::LISTEN_BACKLOG);

        do {
            $client = $this->socket->accept();

            if(!$client) {
                continue;
            }

            $peer = $client->getPeerName();
            $data = $client->read(2 ** 18);

            $this->messageAnalyzer->analyze($data);
        } while (true);
    }

    static public function message(string $payload) {
        $socket = new \Socket(Constants::AF_INET, Constants::SOCK_STREAM, Constants::SOL_TCP);
        $socket->connect('127.0.0.1', self::IPC_PORT);

        $socket->write($payload);
        $socket->close();
    }
}