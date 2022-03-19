<?php

namespace App\Http\Services;

use App\Http\Infrastructure\Service\Service;

class CollectDateService implements Service
{

    private $dataProviderX;
    private $dataProviderY;
    private $dataProviderW;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DataProviderXService $dataProviderX, DataProviderWService $dataProviderW, DataProviderYService $dataProviderY)
    {
        $this->dataProviderX = $dataProviderX;
        $this->dataProviderW = $dataProviderW;
        $this->dataProviderY = $dataProviderY;
    }

    public function handle()
    {
        $dataX = $this->dataProviderW->handle();
        $dataY = $this->dataProviderX->handle();
        $dataW = $this->dataProviderY->handle();

        return collect([$dataX, $dataY, $dataW]);
    }



}
