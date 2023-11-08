<?php

namespace App\Observers;

use App\Models\Multimedia\Media;
use Illuminate\Support\Facades\Storage;

class MediaObserver
{
    /**
     * Handle the Media "created" event.
     *
     * @param  \App\Models\Multimedia\Media  $media
     * @return void
     */
    public function created(Media $media)
    {
        //
    }

    /**
     * Handle the Media "updated" event.
     *
     * @param  \App\Models\Multimedia\Media  $media
     * @return void
     */
    public function updated(Media $media)
    {
        //
    }

    /**
     * Handle the Media "deleted" event.
     *
     * @param  \App\Models\Multimedia\Media  $media
     * @return void
     */
    public function deleted(Media $media)
    {
        if (empty($media->url) || $media->media_type != Media::TYPE_IMAGE) {
            return;
        }
        Storage::disk( 's3')->delete($media->url);
    }

    /**
     * Handle the Media "restored" event.
     *
     * @param  \App\Models\Multimedia\Media  $media
     * @return void
     */
    public function restored(Media $media)
    {
        //
    }

    /**
     * Handle the Media "force deleted" event.
     *
     * @param  \App\Models\Multimedia\Media  $media
     * @return void
     */
    public function forceDeleted(Media $media)
    {
        //
    }
}
