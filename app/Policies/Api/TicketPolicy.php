<?php

namespace App\Policies\Api;

use App\Models\Ticket;
use App\Models\User;
use App\Permissions\Abilities;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->tokenCan(Abilities::ViewAllUserTicket)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ticket $ticket)
    {
        if($user->tokenCan(Abilities::ViewOwnTicket)){
            return $user->id === $ticket->user_id;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->tokenCan(Abilities::CreateOwnTicket)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        if($user->tokenCan(Abilities::UpdateUserTicket)){
            return true;
        }else if($user->tokenCan(Abilities::UpdateOwnTicket)){
            return $user->id === $ticket->user_id;
        }
        return false;
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        if($user->tokenCan(Abilities::DeleteUserTicket)){
            return true;
            
        } else if($user->tokenCan(Abilities::DeleteOwnTicket)){
            return $user->id === $ticket->user_id;
        }
        return false;
            
    }

    public function viewTrashed(User $user){
        if($user->tokenCan(Abilities::ViewTrashedTicket)){
            return true;
        }
        return false;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user)
    {
        if($user->tokenCan(Abilities::RestoreTrashedTicket)){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ticket $ticket)
    {
        return true;
    }
}
