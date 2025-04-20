<?php

namespace App\Core\Result;

final class TypedResult
{
    public readonly bool $isSuccess;
    public readonly bool $isFailure;
    public readonly mixed $data;
    public readonly mixed $error;
    public readonly ?array $errors;

    private function __construct(
        bool $isSuccess,
        mixed $data = null,
        mixed $error = null,
        ?array $errors = null
    ) {
        $this->isSuccess = $isSuccess;
        $this->isFailure = !$isSuccess;
        $this->data = $data;
        $this->error = $error;
        $this->errors = $errors;
    }

    public static function success(mixed $data): self
    {
        return new self(true, $data);
    }

    public static function failure(mixed $error): self
    {
        return new self(false, null, $error);
    }

    public static function validationFailure(array $errors): self
    {
        return new self(false, null, null, $errors);
    }
}