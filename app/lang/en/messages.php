<?php

return array(
    'error' => array(
        'mail' => "Something went wrong in the sending process, please send us a mail direct from your email.",
        'validation' => "Validation errors.",
        'create_card_fail_save' => "Something went wrong in the save process of the card, please try again!",
        'create_banned' => 'You\'re banned from creating cards',
        'ip_used' => 'You already have a card registered in the last 24h, you can create a new card @',
        'image_mimetype' => 'You tried to upload an file that\'s not a valid image type. Please use JPG, GIF, PNG',
        'image_unknown' => 'The server could not complete your request, please try again later'
    ),
    'success' => array(
        'contact_mail' => "An email was sent! We'll respond as soon as possible, we try to answer all mails within 24h.",
        'feedback_mail' => "An email was sent! Thanks for letting us know your thoughts on this website.",
        'created_card' => "Your card was created!",
    ),
    'info' => array(

    ),
    'bump' => array(
        'success' => 'The card were bump\'d',
        'server_error' => 'System error, please try again later, if the error stays please contact an administrator',
        'no_user' => 'There\'s no card to bump with this snapname',
        'already_bumped' => 'The card were already bumped, please try again at ',
    ),
);