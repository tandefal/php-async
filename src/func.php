<?php


use React\EventLoop\Loop;
use React\EventLoop\TimerInterface;

if (!function_exists('setTimeout')) {
    function setTimeout(callable $callback, int $timeout): TimerInterface
    {
        $timeout = $timeout > 0 ? $timeout / 1000 : 0.1;
        return Loop::addTimer($timeout, $callback);
    }
}

if (!function_exists('clearTimeout')) {
    function clearTimeout(TimerInterface $timer): void
    {
        Loop::cancelTimer($timer);
    }
}

if (!function_exists('setInterval')) {
    function setInterval(callable $callback, int $timeout): TimerInterface
    {
        $timeout = $timeout > 0 ? $timeout / 1000 : 0.1;
        return Loop::addPeriodicTimer($timeout, $callback);
    }
}

if (!function_exists('clearInterval')) {
    function clearInterval(TimerInterface $timer): void
    {
        Loop::cancelTimer($timer);
    }
}