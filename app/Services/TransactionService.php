<?php

namespace App\Services;

use App;
use App\Repositories\TransactionRepository;

class TransactionService
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function create($data)
    {
        $transaction = $this->transactionRepository->create($data);
        
        $statusService = App::make('App\Services\StatusService');
        $statusService->updateStatus($transaction);
    }
}
