<?php

namespace App\Exceptions\Resource;

use App\Exceptions\BaseException;

class ResourceInvalidException extends ResourceException
{
    private static $statusCode = 404;
    private static $messageError = 'Recurso inválido';

    private function __construct(?string $resource, ?string $attribute = null, ?string $justification = null)
    {
        $justification = $justification ?? self::$messageError;
        parent::__construct(self::$statusCode, $resource, $attribute, $justification);
    }

    public static function create(?string $resource, ?string $attribute = null, ?string $justification = null): self
    {
        return new self($resource, $attribute, $justification);
    }
}