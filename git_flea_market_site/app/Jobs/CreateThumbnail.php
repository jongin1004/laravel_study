<?php

namespace App\Jobs;

use Illuminate\Http\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Image;
use Illuminate\Support\Facades\Storage;

class CreateThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $photo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $photoFile = Storage::get('public/'.$this->photo->hashname);

        $thumbnail = Image::make($photoFile);

        $thumbnail->resize(256, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $ext = pathinfo($this->photo->url, PATHINFO_EXTENSION);
        $path = storage_path('app/public').'/temp_thumbnail,'.$ext;
        $thumbnail->save($path);

        $thumbnailFile = new File($path);

        $this->photo->thumbnail_url = Storage::url(Storage::putFile('public', $thumbnailFile));

        $this->photo->save();
    }
}
