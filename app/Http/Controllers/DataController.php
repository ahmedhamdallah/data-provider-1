<?php

namespace App\Http\Controllers;
use App\Http\Services\CollectDateService;
use App\Http\Services\FilterDateService;
use Illuminate\Http\Request;

class DataController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FilterDateService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->handle();
    }




    //
}
