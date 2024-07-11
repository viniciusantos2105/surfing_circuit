<?php

namespace App\Exceptions\Resource;

use App\Exceptions\BaseException;

class ResourceCannotCreateException extends ResourceException
{
    private static $statusCode = 404;
    private static $messageError = 'Não foi possível criar o recurso';

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