<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function verify(User $user, Task $task)
    {
        return $user->id === $task->user_id; //si el user es el mismo q el id de la tarea
    }
}