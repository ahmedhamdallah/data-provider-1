<?php

namespace App\Http\Services;

use App\Http\Infrastructure\Service\Service;

class DataProviderXService implements Service
{

    public function handle()
    {
        $originalData = $this->providerDate();
        return $this->finalData($originalData);
    }

    private function fileName($path)
    {
        return basename($path, ".json");
    }

    private function finalData($transaction)
    {
        $data['provider'] = $this->fileName(storage_path() . "/DataProviderX.json");
        $data['amount'] = $transaction['transactionAmount'];
        $data['currency'] = $transaction['Currency'];
        $data['phone'] = $transaction['senderPhone'];
        $data['status'] = [1 => 'paid', 2 => 'pending', 3 => 'reject'][$transaction['transactionStatus']];
        $data['created_at'] = $transaction['transactionDate'] ;
        $data['id'] = $transaction['transactionIdentification'];
        return $data;
    }

    private function providerDate()
    {
        return (array)json_decode(file_get_contents(storage_path() . "/DataProviderX.json"));
    }


}
