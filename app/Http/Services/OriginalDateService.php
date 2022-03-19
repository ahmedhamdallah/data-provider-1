<?php

namespace App\Http\Services;

use App\Http\Infrastructure\Service\Service;

class OriginalDateService implements Service
{

    public function handle()
    {
        // TODO: Implement handle() method.
    }

    public function originalData($transaction, $status, $providerName)
    {
        $data['provider'] = $providerName;
        $data['amount'] = $transaction['amount'];
        $data['currency'] = $transaction['currency'];
        $data['phone'] = $transaction['phone'];
        $data['status'] = $status[$transaction['status']];
        $data['created_at'] = $transaction['created_at'] ;
        $data['id'] = $transaction['id'];

        return $data;
    }


}
