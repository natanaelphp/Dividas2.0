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
}
