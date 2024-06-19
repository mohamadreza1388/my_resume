<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class DeployController extends Controller
{
    public function deploy()
    {
        if (!config('app.debug'))
            abort(404);

        $this->db();
        $this->cache();
        $this->disableDebug();

        return response()->json('App deployed successfully', 200);
    }

    private function db(): void
    {
        Artisan::call('migrate:fresh --seed');
    }

    private function cache(): void
    {
        Artisan::call('optimize');
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
    }

    public function disableDebug(): void
    {
        $path = base_path('bootstrap' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'oldconfig.php');
        if (file_exists($path))
            file_put_contents($path, str_replace(
                "'debug' => true", "'debug' => false",
                file_get_contents($path)
            ));
//        Config::set('app.debug', false);
//        $configPath = base_path('bootstrap/cache/config.php');
//        if (file_exists($configPath)) {
//            Artisan::call('config:cache');
//        }
    }
}
