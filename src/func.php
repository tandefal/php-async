<?php


use React\EventLoop\Loop;
use React\EventLoop\TimerInterface;

function getTime(int $ms): float|int
{
    if($ms > 0) {
        return $ms / 1000;
    }
    return 0.1;
}

function setTimeout(callable $callback, int $timeout): TimerInterface
{
    return Loop::addTimer(getTime($timeout), $callback);
}

function clearTimeout(TimerInterface $timer): void
{
    Loop::cancelTimer($timer);
}

function setInterval(callable $callback, int $timeout): TimerInterface
{
    return Loop::addPeriodicTimer(getTime($timeout), $callback);
}

function clearInterval(TimerInterface $timer): void
{
    Loop::cancelTimer($timer);
}
