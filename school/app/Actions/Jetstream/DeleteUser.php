<?php

namespace App\Actions\Jetstream;

use App\Http\Controllers\Admin\JoinUniversity\OneOnOneMeetingController;
use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  User  $user
     * @return void
     */
    public function delete($user)
    {
        \DB::transaction(function () use ($user){
            User\UserBio::whereUserId($user->id)->delete();
            User\UserSchool::whereUserId($user->id)->delete();
            User\UserRole::whereUserId($user->id)->delete();
            User\UserPreference::whereUserId($user->id)->delete();
            User\UserOneOnOneMeeting::whereHostId($user->id)->delete();
            User\UserOneOnOneMeetingSlotBookingRequest::whereRequestedBy($user->id);
            User\UserOneOnOneMeetingSlot::whereBookedBy($user->id)->update(['booked_by'=>null]);
//            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        });
    }
}
