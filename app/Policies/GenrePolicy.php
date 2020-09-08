<?php

namespace App\Policies;

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
            return false;
        }
        $diffrenceInHours =  $oldGenre->created_at->diffInHours(now());
        if ($diffrenceInHours > 1) {
            return false;
        }
        return true;
    }
}
