<?php

class ImagesController extends BaseController
{
    public function store()
    {
        $extension = Input::file('image')->getClientOriginalExtension();

        $destinationPath = 'uploads/';
        $fileName = md5(uniqid(rand(), true) . date('Y-m-d H:i:s')) . '.' . $extension;

        $url = $destinationPath . $fileName;

        $pixel = $this->getPixels(Input::file('image'));

        if ($pixel["width"] < 4 || $pixel["height"] < 4) {
            die('Invalid');
        }


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

        $path = url() . '/' . $src;
        $headers = get_headers($path, 1);

        switch ($headers['Content-Type']) {
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($src);
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($src);
                break;
            case 'image/png':
                $img_r = imagecreatefrompng($src);
                break;
            default:
                die('Invalid image type');
        }
        $pixel = $this->getPixels($img_r);

        if ($pixel["width"] < 4 || $pixel["height"] < 4) {
            die('Invalid');
        }


        $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

        list($width) = getimagesize($src);
        $ratio = $width / Input::get('image-width');

        imagecopyresampled($dst_r, $img_r, 0, 0, Input::get('x') * $ratio, Input::get('y') * $ratio,
            $targ_w, $targ_h, Input::get('w') * $ratio, Input::get('h') * $ratio);

        imagejpeg($dst_r, $src, $jpeg_quality);
        return Response::json(['url' => $src]);
    }

    protected function getPixels($getImage)
    {
        list($width, $height) = getImageSize($getImage);
        return array("width" => $width, "height" => $height);
    }

}
