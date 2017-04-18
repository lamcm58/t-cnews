<?php

use App\Models\News;
use Illuminate\Support\Facades\Auth;

class AdminCountNews
{
    /**
     *Count the number of unchecked news
     *
     * @return number
     */
    public static function countNewsNotCheck()
    {
        if (Auth::user()->user_role == 1)
        {
            return News::where('news_is_check', 0)->count();
        } else {
            return 0;
        }
    }

    /**
     * Get the unchecked news
     *
     * @return mixed
     */
    public static function getNewsNotCheck()
    {
        return News::where('news_is_check', 0)->get();
    }
}