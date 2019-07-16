<?php

namespace App\Listeners;

use App\Events\ViewPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Session\Store;

class IncrementCoutViewPost
{
    private $session;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param ViewPost $event
     * @return void
     */
    public function handle(ViewPost $event)
    {
        if (!$this->isPostViewed($event->post)) {

            $event->post->increment('view_count');

            $this->storePost($event->post);
        }
    }

    private function isPostViewed($post)
    {
        $viewed = $this->session->get('viewed_posts', []);

        return array_key_exists($post->id, $viewed);
    }

    private function storePost($post)
    {
        $key = 'viewed_posts.' . $post->id;

        $this->session->put($key, time());
    }
}
