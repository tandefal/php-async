<?php

use React\Promise\Deferred;

if (!class_exists('Promise')) {
    class Promise
    {
        private $deferred;

        public function __construct(callable $callback)
        {
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

        public function then(callable $callback): \React\Promise\PromiseInterface
        {
            return $this->deferred->promise()->then($callback);
        }

        public function catch(callable $callback): \React\Promise\PromiseInterface
        {
            return $this->deferred->promise()->catch($callback);
        }

        public function finally(callable $callback): \React\Promise\PromiseInterface
        {
            return $this->deferred->promise()->finally($callback);
        }
    }
}