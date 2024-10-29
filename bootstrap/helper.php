<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

function setting($key)
{
    $cacheKey = 'settings_'.$key;

    return Cache::remember($cacheKey, 24 * 60 * 60, function () use ($key) {
        return Setting::where('key', $key)->firstOrFail()?->value;
    });
}
