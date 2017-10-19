<?php declare(strict_types=1);

namespace Tennessine\IPC\Analyze;

/**
 * Class AnalyzedStore
 * @package Tennessine\IPC\Analyze
 */
class AnalyzedStore {
    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $store;

    public function __construct() {
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type): AnalyzedStore {
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool $store
     * @return AnalyzedStore
     */
    public function setStore(bool $store): AnalyzedStore {
        $this->store = $store;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStore(): bool {
        return $this->store;
    }
}