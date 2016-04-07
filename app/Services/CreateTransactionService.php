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

        $this->sendTelegramMessage($transaction);

        $updateStatusService = App::make('App\Services\UpdateStatusService');
        $updateStatusService->updateStatus($transaction);
    }

    private function sendTelegramMessage($transaction)
    {
        $response = \Telegram::sendMessage([
          'chat_id' => env('CHAT_ID'),
          'text'    => $this->createMessage($transaction),
        ]);
    }

    public function createMessage($transaction)
    {
        $message =
            'Nova transação criada por '.$transaction->createdBy->name.PHP_EOL.PHP_EOL.
            'Descrição: '.$transaction->description.PHP_EOL.
            'Valor: '.$transaction->value.PHP_EOL.
            'Tipo: '.$this->getType($transaction).PHP_EOL
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
