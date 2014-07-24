<?php

class ImagesController extends BaseController
{
    public function store()
    {
        $extension = Input::file('image')->getClientOriginalExtension();

        $destinationPath = 'uploads/';
        $fileName = md5(uniqid(rand(), true) . date('Y-m-d H:i:s')) . $extension;

        $url = $destinationPath . $fileName;

        Input::file('image')->move($destinationPath, $fileName);

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

        imagecopyresampled($dst_r, $img_r, 0, 0, Input::get('x'), Input::get('y'),
            $targ_w, $targ_h, Input::get('w'), Input::get('h'));

        imagejpeg($dst_r, $src, $jpeg_quality);
        return Response::json(['url' => $src]);
    }
}