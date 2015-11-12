<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    private $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $transactions = $this->model->with('paidBy')
                                    ->with('createdBy')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(8);

        return $transactions;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
