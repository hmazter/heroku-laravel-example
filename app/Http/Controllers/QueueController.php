<?php

namespace App\Http\Controllers;

use App\Jobs\LongRunningQueueJob;

class QueueController extends Controller
{
    public function index()
    {
        LongRunningQueueJob::dispatch();

        session()->flash('success', 'Post creation queued!');

        return redirect('/');
    }
}
