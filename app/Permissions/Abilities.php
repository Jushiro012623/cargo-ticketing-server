<?php

namespace App\Permissions;

use App\Models\User;

final class Abilities
{
    public const CreateTicket = 'ticket:create'; // user 
    public const UpdateTicket = 'ticket:update'; // manager / admim
    public const ReplaceTicket = 'ticket:replace'; // manager / admim
    public const DeleteTicket = 'ticket:delete'; // manager / admim
    public const RestoreTicket = 'ticket:restore'; // admim
    public const ViewTrashedTicket = 'ticket:view:trashed'; // admim

    public const UpdateOwnTicket = 'ticket:own:update'; //user
    public const DeleteOwnTicket = 'ticket:own:delete'; //user

    public const CreateUser = 'user:create'; // administrator / manager
    public const UpdateUser = 'user:update'; // administrator / manager
    public const ReplaceUser = 'user:replace'; // administrator / manager
    public const DeleteUser = 'user:delete'; // administrator / manager


    public static function getAbilities(User $user)
    {
        if ($user->user_role_id === 2) {
            return [
                self::UpdateTicket,
                self::ReplaceTicket,
                self::DeleteTicket,
                self::RestoreTicket,
            ];
        } elseif($user->user_role_id === 3) {
            return ['*'];
        }
        else {
            return [
                self::CreateTicket, 
                self::UpdateOwnTicket,
                self::DeleteOwnTicket,
            ];
        }
    }
}
