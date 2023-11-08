<?php

namespace App\Observers;

use App\Models\Multimedia\Media;
use App\Models\Multimedia\MediaAlbum;

class AlbumObserver
{
    /**
     * Handle the MediaAlbum "created" event.
     *
     * @param  \App\Models\Multimedia\MediaAlbum  $mediaAlbum
     * @return void
     */
    public function created(MediaAlbum $mediaAlbum)
    {
        //
    }

    /**
     * Handle the MediaAlbum "updated" event.
     *
     * @param  \App\Models\Multimedia\MediaAlbum  $mediaAlbum
     * @return void
     */
    public function updated(MediaAlbum $mediaAlbum)
    {
        //
    }

    /**
     * Handle the MediaAlbum "deleted" event.
     *
     * @param  \App\Models\Multimedia\MediaAlbum  $mediaAlbum
     * @return void
     */
    public function deleted(MediaAlbum $mediaAlbum)
    {
        if ($mediaAlbum->content_type != Media::TYPE_IMAGE) return;
        $mediaAlbum->media()->each(fn(Media $media)=>$media->delete());
    }

    /**
     * Handle the MediaAlbum "restored" event.
     *
     * @param  \App\Models\Multimedia\MediaAlbum  $mediaAlbum
     * @return void
     */
    public function restored(MediaAlbum $mediaAlbum)
    {
        //
    }

    /**
     * Handle the MediaAlbum "force deleted" event.
     *
     * @param  \App\Models\Multimedia\MediaAlbum  $mediaAlbum
     * @return void
     */
    public function forceDeleted(MediaAlbum $mediaAlbum)
    {
        //
    }
}
