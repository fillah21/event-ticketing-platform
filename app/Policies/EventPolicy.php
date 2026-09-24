<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
// use Illuminate\Auth\Access\Response;

class EventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Event $event): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, int $organization_id): bool
    {
        if($user->hasRole('admin')) {
            return true;
        }

        return $user->organizations()
                ->wherePivot('role', 'owner')
                ->wherePivot('organization_id', $organization_id)
                ->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Event $event): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }
        
        $isOrganizationOwner = $event->organization
            ->users()
            ->where('users.id', $user->id)
            ->wherePivot('role', 'owner')
            ->exists();

        if ($isOrganizationOwner) {
            return true;
        }

        return $event->assignments()
            ->where('user_id', $user->id)
            ->where('role', 'event_manager')
            ->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Event $event): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Event $event): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        return false;
    }
}
