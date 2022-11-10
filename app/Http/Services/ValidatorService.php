<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ValidatorService
{
    public static function validate(array $input, array $rules): ?MessageBag
    {
        $validator = Validator::make($input, $rules);

        if ($validator->fails())
           return $validator->errors();

        return null;
    }

    public static function validateOnly(array $input, string $data, string $rules): ?MessageBag
    {
        $validator = Validator::make(
            $input,
            [$data => $rules]
        );

        if ($validator->fails())
            return $validator->errors();

        return null;
    }
}
