<?php

use React\Promise\Deferred;

class Promise {
    private $deferred;

    public function __construct(Callable $callback) {
        $this->deferred = new Deferred();
        $callback($this->resolve(), $this->reject());
    }

    private function resolve(): Closure
    {
        return function ($value) {
            $this->deferred->resolve($value);
        };
    }

    private function reject(): Closure
    {
        return function ($value) {
            $this->deferred->reject($value);
        };
    }

    public function then(Callable $callback): \React\Promise\PromiseInterface
    {
        return $this->deferred->promise()->then($callback);
    }

    public function catch(Callable $callback): \React\Promise\PromiseInterface
    {
        return $this->deferred->promise()->catch($callback);
    }

    public function finally(Callable $callback): \React\Promise\PromiseInterface
    {
        return $this->deferred->promise()->finally($callback);
    }
}