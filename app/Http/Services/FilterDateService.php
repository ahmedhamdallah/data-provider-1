<?php

namespace App\Http\Services;

use App\Http\Infrastructure\Service\Service;

class FilterDateService implements Service
{

    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CollectDateService $service)
    {
        $this->service = $service;
    }

    public function handle()
    {
        return $this->service->handle()->when(request('statusCode', '') != '', function ($query) {
            return $query->where('status', request('statusCode'));
        })->when(request('currency', '') != '', function ($query) {
            return $query->where('currency', request('currency'));
        })->when(request('amounteMin', '') != '', function ($query) {
            return $query->where('amount', '>=', request('amounteMin'));
        })->when(request('amounteMax', '') != '', function ($query) {
            return $query->where('amount', '<=', request('amounteMax'));
        });

    }



}
