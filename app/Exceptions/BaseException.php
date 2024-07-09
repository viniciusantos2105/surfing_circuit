<?php

namespace App\Exceptions;

abstract class BaseException extends \Exception
{
    protected $errorCode;
    protected $type;
    protected $resource;
    protected $attribute;
    protected $justification;
    protected function __construct(
        string $errorCode,
        string $type,
        ?string $resource,
        ?string $attribute,
        ?string $justification,
        ?\Throwable $previous = null
    ) {
        $this->type = $type;
        $this->errorCode = $errorCode;
        $this->resource = $resource;
        $this->justification = $justification;
        $this->attribute = $attribute;
        parent::__construct($justification);
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function getAttribute(): ?string
    {
        return $this->attribute;
    }

    public function getJustification(): ?string
    {
        return $this->message;
    }

    public function returnToJson()
    {
        $properties = ['type', 'resource', 'attribute', 'justification'];
        $response = [];
        foreach ($properties as $property) {
            if ($this->$property !== null) {
                $response[$property] = $this->$property;
            }
        }
        return response()->json($response, $this->getErrorCode());
    }


}
