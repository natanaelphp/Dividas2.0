<?php

namespace App\Services;

use App\Repositories\StatusRepository;

class HomePageDataService
{
    private $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function getDataForHomePage($status, $user)
    {
        $status = $this->statusRepository->getStatus($status);

        if ($user->id == $status->userReceiver->id) {
            $arrowDirection = 'left';
            $otherUserImage = $status->userDebtor->image;
            $otherUserId    = $status->userDebtor->id;
        }

        if ($user->id == $status->userDebtor->id) {
            $arrowDirection = 'right';
            $otherUserImage = $status->userReceiver->image;
            $otherUserId    = $status->userReceiver->id;
        }

        return $data = [
            'userImage'         => $user->image,
            'otherUserImage'    => $otherUserImage,
            'arrowDirection'    => $arrowDirection,
            'value'             => $status->value,
            'userId'            => $user->id,
            'otherUserId'       => $otherUserId,
        ];
    }
}
