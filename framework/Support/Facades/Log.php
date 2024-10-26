<?php

namespace Framework\Support\Facades;

/**
 * @method  static void info(mixed $message)
 * @method  static void warning(mixed $message)
 * @method  static void error(mixed $message)
 * @method  static void debug(mixed $message)
 *
 * @see \Framework\Log\LogManager
 */
class Log extends Facade {
    protected static function getFacadeAccessor(): string {
        return 'log';
    }
}