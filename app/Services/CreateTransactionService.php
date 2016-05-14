<?php

namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Services\UpdateStatusService;

class CreateTransactionService
{
    private $transactionRepository;
    private $updateStatusService;

    public function __construct(
        TransactionRepository $transactionRepository,
        UpdateStatusService $updateStatusService
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->updateStatusService = $updateStatusService;
    }

    public function createTransaction($data)
    {
        $transaction = $this->transactionRepository->create($data);

        $this->sendTelegramMessage($transaction);

        $this->updateStatusService->updateStatus($transaction);
    }

    private function sendTelegramMessage($transaction)
    {
        $response = \Telegram::sendMessage([
          'chat_id' => env('CHAT_ID'),
          'text'    => $this->createMessage($transaction),
        ]);
    }

    private function createMessage($transaction)
    {
        $message =
            'Nova transação criada por '.$transaction->createdBy->name.PHP_EOL.PHP_EOL.
            'Descrição: '.$transaction->description.PHP_EOL.
            'Valor: '.$transaction->value.PHP_EOL.
            'Tipo: '.$this->getType($transaction).PHP_EOL.
            'Pago por: '.$transaction->paidBy->name.PHP_EOL
        ;

        return $message;
    }

    private function getType($transaction)
    {
        $types = [
            'DividedPayment'    => 'Pagamento dividido',
            'DirectPayment'     => 'Pagamento direto',
        ];

        $type = $types[$transaction->type];

        return $type;
    }
}
