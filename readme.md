<h1>PHP-ASYNC</h1>
<hr>

# Что это?

Функции-помощники для работы с циклом событий ReactPHP, популярной PHP платформой с событийно-ориентированным,
неблокирующим вводом-выводом.
Эти таймеры имеют вид javascript setInterval,setTimeout и Promise.

# Установка

Убедитесь, что у вас установлен Composer

```bash
composer require tandefal/php-async
```

После установки включите автозагрузчик Composer в свой код:

```php
require 'vendor/autoload.php';
```

# Применение

- interval указываем в ms
- setInterval(int $interval, callable $callback): React\EventLoop\TimerInterface;

```php
$count = 1;
setInterval(function () use(&$count) {
    echo "Count: {$count}\n";
    $count++;
}, 1000);
```

- interval указываем в ms
- setTimeout(int $interval, callable $callback): React\EventLoop\TimerInterface;

```php
setTimeout(function () {
    echo "Hello World\n";
}, 1000);
```

- clearTimeout(React\EventLoop\TimerInterface $timer): void;

```php
$timeout = setTimeout(function(){
    //The following code will not run
    echo "Hello Planet\n";
}, 1000);
clearTimeout($timeout);
```

- clearInterval(React\EventLoop\TimerInterface $timer): void;

```php
setInterval(function($timer){
    clearInterval($timer);
    //The following code will only run once
    echo "Hello World\n";
}, 1000);
```