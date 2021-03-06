<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ReplyController extends Controller
{
    /**
     * Controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Persist a new reply
     *
     * @param Thread $thread
     * @return Illuminate\Http\RedirectResponse;
     */
    public function store(Thread $thread)
    {
        $thread->addReply([
            'body'=> request('body'),
            'user_id' => auth()->id()
        ]);
        
        return back();
    }
}
