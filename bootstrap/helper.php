<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

function setting($key, $cache = false)
{
    if ($cache) {
        $cacheKey = 'settings_'.$key;

        return Cache::remember($cacheKey, 24 * 60 * 60, function () use ($key) {
            return Setting::where('key', $key)->firstOrFail()?->value;
        });
    } else {
        return Setting::where('key', $key)->firstOrFail()?->value;
    }
}
