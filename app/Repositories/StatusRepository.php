<?php

namespace App\Repositories;

use App\Models\Status;

class StatusRepository
{
    private $model;

    public function __construct(Status $model)
    {
        $this->model = $model;
    }

    public function getStatus($id)
    {
        $status = $this->model->find($id)
                            ->with('userDebtor')
                            ->with('userReceiver')
                            ->get()[0];

        return $status;
    }
}
