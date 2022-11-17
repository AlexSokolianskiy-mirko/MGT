<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\Token;

class TokenObserver
{
    /**
     * Handle the Token "created" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function created(Token $token)
    {
        $tag = $token->tags()->where('name', $token->name)->first();

        if (!$tag) {
            $tag = new Tag([
                'name' => $token->name,
            ]);
            $token->tags()->save($tag);
        }
    }

    /**
     * Handle the Token "updated" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function updated(Token $token)
    {
        $token->tags()->updateOrCreate(['name' => $token->name], [
            'name' => $token->name
        ]);
    }

    /**
     * Handle the Token "deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function deleted(Token $token)
    {
        //
    }

    /**
     * Handle the Token "restored" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function restored(Token $token)
    {
        //
    }

    /**
     * Handle the Token "force deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function forceDeleted(Token $token)
    {
        //
    }
}
