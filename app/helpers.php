<?php

function image_fix_orientation($filename) {
    $mime_type = mime_content_type($filename);
    if($mime_type == 'image/jpg' || $mime_type == 'image/jpeg') {
        $exif = exif_read_data($filename);
        if (!empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 3:
                case 6:
                case 8:
                    $image = imagecreatefromjpeg($filename);
                    switch ($exif['Orientation']) {
                        case 3:
                            $image = imagerotate($image, 180, 0);
                            break;

                        case 6:
                            $image = imagerotate($image, -90, 0);
                            break;

                        case 8:
                            $image = imagerotate($image, 90, 0);
                            break;
                    }
                    imagejpeg($image, $filename, 90);
                    break; // belongs to the triple case 3,6,8
                default:
                    break;
            }
        }
    }
}