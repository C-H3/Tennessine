<?php declare(strict_types=1);

namespace Tennessine\IPC\Analyze;

/**
 * Analyzes the JSON messages received in IPC broadcasts, and other various
 * messages.
 * @package Tennessine\IPC
 */
class Analyzer {
    private $name;

    /**
     * Give me a name. A kawaii name.
     * @param string $name
     */
    public function __construct(string $name = 'Hentai Tensai Shoujo') {
        $this->name = $name;
    }

    public function analyze(string $payload = '') {
        $decodedJSON = json_decode($payload, true);

        if(!$decodedJSON) {
            throw new \ParseError(
                sprintf(
                    'JSON Parse error, when trying to decode JSON provided for analyzing from IPC Controller.\nProvided string: %s',
                    $payload
                )
            );
        }

        $analyzeStore = new AnalyzedStore();

        $this->_storeData($decodedJSON, $analyzeStore);
    }

    private function _storeData(array $JSONData, AnalyzedStore $analyzeStore) {
        var_dump($JSONData);
    }
}