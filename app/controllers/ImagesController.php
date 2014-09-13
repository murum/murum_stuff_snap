<?php

class ImagesController extends BaseController
{
    public function store()
    {
        $ip_is_ok = Common::ipIsFree();

        if ( $ip_is_ok ) {
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $max_size = 10000 * 1024; // max file size (1mbit)

            // Check mimetype
            $MIME = array('image/gif', 'image/jpeg', 'image/png');
            $uploadedMIME = Input::file('image')->getMimeType();

            if (!in_array($uploadedMIME, $MIME)) {
                return Response::json(['success' => false, 'message' => Lang::get('messages.error.image_mimetype')]);
            }

            // Laravel Validation of file and size.
            $input = Input::all();
            $rules = array(
                'file' => 'image|max:3000',
            );

            $validation = Validator::make($input, $rules);

            if ($validation->fails())
            {
                return Response::json(['success' => false, 'message' => Lang::get('messages.error.image_mimetype')]);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $file = Input::file('image');
                // get uploaded file extension
                //$ext = $file['extension'];
                $ext = $file->guessClientExtension();
                // get size
                $size = $file->getClientSize();
                if (in_array($ext, $valid_exts) AND $size < $max_size) {
                    // move uploaded file from temp to uploads directory
                    $extension = Input::file('image')->getClientOriginalExtension();

                    $fileName = md5(uniqid(rand(), true) . date(Common::STANDARD_DATETIME_FORMAT)) . '.' . $extension;

                    $destination_path = base_path() . '/card_images';
                    $url = '/uploads/'.$fileName;

                    $pixel = $this->getPixels(Input::file('image'));

                    if ($pixel["width"] < 4 || $pixel["height"] < 4) {
                        die('Invalid');
                    }

                    Input::file('image')->move($destination_path, $fileName);
                    image_fix_orientation($destination_path . '/' .$fileName);

                    return Response::json(['success' => true, 'url' => $fileName]);
                } else {
                    return Response::json(['success' => false, 'message' => Lang::get('messages.error.image_unknown')]);
                }
            }
        } else {
            $user = Common::getUserByBusyIP();
            return Response::json(['success' => false, 'message' => Lang::get('messages.error.ip_used') . ' ' .$user->created_at->modify('+1 day')]);
        }
    }

    public function update()
    {
        $targ_w = 255 * 1.2;
        $targ_h = 172 * 1.2;
        $jpeg_quality = 75;

        $path = url() . '/uploads/'.Input::get('image-url');
        $src = base_path() . '/card_images/'.Input::get('image-url');

        $headers = pathinfo($path);

        switch ($headers['extension']) {
            case 'jpeg':
                $img_r = imagecreatefromjpeg($src);
                break;
            case 'jpg':
                $img_r = imagecreatefromjpeg($src);
                break;
            case 'JPG':
                $img_r = imagecreatefromjpeg($src);
                break;
            case 'JPEG':
                $img_r = imagecreatefromjpeg($src);
                break;
            case 'gif':
                $img_r = imagecreatefromgif($src);
                break;
            case 'GIF':
                $img_r = imagecreatefromgif($src);
                break;
            case 'image/png':
                $img_r = imagecreatefrompng($src);
                break;
            case 'png':
                $img_r = imagecreatefrompng($src);
                break;
            case 'PNG':
                $img_r = imagecreatefrompng($src);
                break;
            default:
                return Response::json(['success' => false]);
        }

        $dst_r = imagecreatetruecolor($targ_w, $targ_h);

        list($width) = getimagesize($src);
        $ratio = $width / Input::get('image-width');

        imagecopyresampled($dst_r, $img_r, 0, 0, Input::get('x') * $ratio, Input::get('y') * $ratio,
            $targ_w, $targ_h, Input::get('w') * $ratio, Input::get('h') * $ratio);

        switch ($headers['extension']) {
            case 'jpeg':
                imagejpeg($dst_r, $src, $jpeg_quality);
                break;
            case 'jpg':
                imagejpeg($dst_r, $src, $jpeg_quality);
                break;
            case 'JPG':
                imagejpeg($dst_r, $src, $jpeg_quality);
                break;
            case 'JPEG':
                imagejpeg($dst_r, $src, $jpeg_quality);
                break;
            case 'gif':
                imagegif($dst_r, $src);
                break;
            case 'GIF':
                imagegif($dst_r, $src);
                break;
            case 'image/png':
                imagepng($dst_r, $src, $jpeg_quality);
                break;
            case 'png':
                imagepng($dst_r, $src, $jpeg_quality);
                break;
            case 'PNG':
                imagepng($dst_r, $src, $jpeg_quality);
                break;
        }

        return Response::json(['url' => $path]);
    }

    public function get_image($filename) {
        // Append the filename to the path where our images are located
        $path = base_path() . '/card_images/'. $filename;

        // Initialize an instance of Symfony's File class.
        // This is a dependency of Laravel so it is readily available.
        $file = new Symfony\Component\HttpFoundation\File\File($path);

        // Make a new response out of the contents of the file
        // Set the response status code to 200 OK
        $response = Response::make(
            File::get($path),
            200
        );

        // If the mimetype is not an image make the Content-Type to text/plain
        $MIME = array('image/gif', 'image/jpeg', 'image/png');
        $fileMIME = $file->getMimeType();
        if( ! in_array($fileMIME, $MIME) ) {
            $fileMIME = 'text/plain';
        }

        // Modify our output's header.
        // Set the content type to the mime of the file.
        // In the case of a .jpeg this would be image/jpeg
        $response->header(
            'Content-Type',
            $fileMIME
        );

        return $response;
    }


    protected function getPixels($getImage)
    {
        list($width, $height) = getImageSize($getImage);
        return array("width" => $width, "height" => $height);
    }

}
