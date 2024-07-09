<?php

namespace App\Exceptions\Resource;

use App\Exceptions\BaseException;

abstract class ResourceException extends BaseException
{
    protected static $typeError = 'ResourceError';

    protected function __construct(int $statusCode, ?string $resource,  ?string $attribute, ?string $justification)
    {
        parent::__construct($statusCode, self::$typeError, $resource, $attribute, $justification);
    }

}
