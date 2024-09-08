<?php

namespace App\traits;


trait upload_image
{
    public function uploadImage($file, $folder_name)
    {
        $valid_extensions = ['jpg', 'jpeg', 'png', 'svg', 'gif'];
        $extension = $file->getClientOriginalExtension();

        if (in_array($extension, $valid_extensions)) {
            $name = time() . rand(0, 999999999) . '_image_' . $file->getClientOriginalName();
            $file->move(public_path('images/' . $folder_name), $name);
            return $folder_name . '/' . $name;
        } else {
            return false;
        }
    }
}
