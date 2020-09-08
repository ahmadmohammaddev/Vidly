<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Genre;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // The genre cannot be updated after one houre of creation
    public function update(?User $user,Genre $genre)
    {
        $oldGenre = Genre::find($genre->id);
        if (empty($oldGenre->created_at)) {
            return Response::deny('There is no genre with this id!!');
        }
        $diffrenceInHours =  $oldGenre->created_at->diffInHours(now());
        if ($diffrenceInHours > 1) {
            return Response::deny('You can not edit genre name after an hour of creating it!!');
        }
        return Response::allow();
    }
}
