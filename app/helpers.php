<?php
function auth_user()
{
    if(session()->exists('user_id'))
    {
        return App\Models\User::find(session()->get('user_id'));
    }
    return NULL;
}
