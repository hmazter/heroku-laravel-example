<?php

namespace App\Jobs;

use App\Post;
use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LongRunningQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(3);

        $faker = Factory::create();
        $postCount = Post::all()->count() + 1;
        Post::create([
            'title' => "Post #$postCount, created through the queue",
            'body' => $faker->paragraphs(3, true),
        ]);
    }
}
