<?php
namespace App\Services;

use App\Models\User;

class UserService {
    public function getSubordinates($userId, $ids=[])
    {
        $user = User::find($userId);
        $subordinateIds = $user->Subordinates->pluck('UserID');
        foreach ($subordinateIds as $id) {
            $ids = array_merge($ids, $this->getSubordinates($id, $ids));
        }
        array_push($ids, $userId);
        return $ids;

    }
}
