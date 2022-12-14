<?php

use JetBrains\PhpStorm\Pure;

class ProductNotFound extends RuntimeException {
    #[Pure] public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
