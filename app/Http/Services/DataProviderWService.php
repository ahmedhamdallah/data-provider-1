<?php

namespace App\Http\Services;

use App\Http\Infrastructure\Service\Service;

class DataProviderWService implements Service
{

    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OriginalDateService $service)
    {
        $this->service = $service;
    }

    private function status()
    {
        return ['done' => 'paid', 'wait' => 'pending', 'nope' => 'reject'];
    }

    public function handle()
    {
        $originalData = $this->providerDate();
        return $this->service->originalData($originalData, $this->status(), $this->fileName());
    }

    private function fileName()
    {
        $path = storage_path() . "/DataProviderW.json";
        return basename($path, ".json");
    }



    private function providerDate()
    {
        return (array)json_decode(file_get_contents(storage_path() . "/DataProviderW.json"));
    }


}
