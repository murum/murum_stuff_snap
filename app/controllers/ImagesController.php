<?php

class ImagesController extends BaseController
{
    public function store()
    {
        $extension = Input::file('image')->getClientOriginalExtension();

        $destinationPath = 'uploads/';
        $fileName = md5(uniqid(rand(), true) . date('Y-m-d H:i:s')) . '.'.$extension;

        $url = $destinationPath . $fileName;

        Input::file('image')->move($destinationPath, $fileName);
        image_fix_orientation($url);

        return Response::json(['url' => $url]);
    }

    public function update()
    {
        $targ_w = 255 * 1.2;
        $targ_h = 172 * 1.2;
        $jpeg_quality = 75;

        $src = Input::get('image-url');
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

        list($width) = getimagesize($src);
        $ratio = $width / Input::get('image-width');

        imagecopyresampled($dst_r, $img_r, 0, 0, Input::get('x') * $ratio, Input::get('y') * $ratio,
            $targ_w, $targ_h, Input::get('w') * $ratio, Input::get('h') * $ratio);

        imagejpeg($dst_r, $src, $jpeg_quality);
        return Response::json(['url' => $src]);
    }
}