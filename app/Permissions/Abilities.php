<?php

namespace App\Permissions;

use App\Models\User;

final class Abilities
{

    //user 
    public const CreateOwnTicket = 'create:own:ticket';
    public const ViewOwnTicket = 'view:own:ticket';
    public const UpdateOwnTicket = 'update:own:ticket';
    public const CancelOwnTicket = 'cancel:own:ticket';
    public const DeleteOwnTicket = 'delete:own:ticket';

    //receiver 
    // public const CancelUserTicket = 'cancel:user:ticket';

    //admin
    public const CreateUser = 'create:user';
    public const DeleteUser = 'delete:user';
    public const ViewAllUser = 'view:all:user';
    public const ViewUser = 'view:user';
    public const ViewAllUserTicket = 'view:all:user:ticket';
    // public const ReplaceUserTicket = 'replace:user:ticket';
    public const UpdateUserTicket = 'update:user:ticket';
    public const DeleteUserTicket = 'delete:user:ticket';
    public const ViewTrashedTicket = 'view:trashed:ticket';
    public const RestoreTrashedTicket = 'restore:trashed:ticket';
    
    public static function getAbilities(User $user)
    {
        // dd($user->user_role_id);
        if ($user->user_role_id === 2) { //receiver
            return [
                self::UpdateUserTicket,
                // self::CancelUserTicket,
            ];
        } elseif($user->user_role_id === 3) { //admin
            return [
                self::CreateUser,
                self::DeleteUser,
                self::ViewAllUser,
                self::ViewUser,
                self::ViewAllUserTicket,
                self::DeleteUserTicket,
                self::ViewTrashedTicket,
                self::RestoreTrashedTicket,
            ];
        }
        else {
            return [
                self::CreateOwnTicket, 
                self::ViewOwnTicket,
                self::UpdateOwnTicket,
                self::CancelOwnTicket,
                self::DeleteOwnTicket,
            ];
        }
    }
}
