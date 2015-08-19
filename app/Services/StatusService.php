<?php

namespace App\Services;

use App\Repositories\StatusRepository;
use App\Repositories\UserRepository;

class StatusService
{
    private $statusRepository;
    private $userRepository;

    public function __construct(StatusRepository $statusRepository, UserRepository $userRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->userRepository = $userRepository;
    }

    public function getDataForHomePage($status, $user_id)
    {
        $status = $this->statusRepository->getStatus($status);
        $user   = $this->userRepository->find($user_id);

        if ($user->id == $status->userReceiver->id) {
            $arrowDirection = 'left';
            $otherUserImage = $status->userDebtor->image;
        }

        if ($user->id == $status->userDebtor->id) {
            $arrowDirection = 'right';
            $otherUserImage = $status->userReceiver->image;
        }

        return $data = [
            'userImage'         => $user->image,
            'otherUserImage'    => $otherUserImage,
            'arrowDirection'    => $arrowDirection,
            'value'             => $status->value,
        ];
    }
}
