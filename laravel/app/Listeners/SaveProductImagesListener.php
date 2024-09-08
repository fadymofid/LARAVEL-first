<?php

namespace App\Listeners;

use App\Actions\ImageModelSave;
use Illuminate\Support\Facades\Log;
use App\Traits\upload_image;

class SaveProductImagesListener
{
    use upload_image;

    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
//        dd('now listener working', $event->data,$event->images,$event->product);
        foreach($event->images as $image) {
            $name = $this->uploadImage($image,'products');
            ImageModelSave::make($event->product->id, 'Product', $name);
        }
    }
}
