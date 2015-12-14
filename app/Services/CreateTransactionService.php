<?php

namespace App\Services;

use App;
use App\Repositories\TransactionRepository;

class CreateTransactionService
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction($data)
    {
        $transaction = $this->transactionRepository->create($data);

        $updateStatusService = App::make('App\Services\UpdateStatusService');
        $updateStatusService->updateStatus($transaction);
    }
}
