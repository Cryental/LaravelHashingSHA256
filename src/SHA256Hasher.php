<?php

namespace Cryental\LaravelHashingSHA256;

use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class SHA256Hasher implements HasherContract
{
    public function info($hashedValue)
    {
        return password_get_info($hashedValue);
    }

    public function make($value, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';

        $hash = hash('sha256', $value.$salt);

        return $hash;
    }

    public function check($value, $hashedValue, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';

        if (strlen($hashedValue) === 0) {
            return false;
        }

        return $hashedValue === hash('sha256', $value.$salt);
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}
