<?php

namespace App\DTOs;

readonly class ProjectData
{
    public function __construct(
        // Add your properties here
        public string $example,
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            example: $request->example,
        );
    }

    public static function fromModel($model): self
    {
        return new self(
            example: $model->example,
        );
    }

    public function toArray(): array
    {
        return [
            'example' => $this->example,
        ];
    }
}