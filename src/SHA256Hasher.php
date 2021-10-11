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
        $hash = hash('sha256', $value);
        return $hash;
    }

    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
		
        return $hashedValue === hash('sha256', $value);
    }
    
    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}
