<?php

use App\Models\Category;

function appCategories($limit = null){
    if($limit){
    return Category::whereNull('parentid')->latest()->limit($limit)->get();
    }else{
     return Category::whereNull('parentid')->latest()->get();
    }
}

function UserStatus($status){
    if($status == '1') return '<span class="badge badge-success">Active</span>';
    if($status == '0') return '<span class="badge badge-danger">Block</span>';
    return '<span class="badge badge-danger">Error</span>';
}

function InstructorBadge($status){
    if($status == 'declined') return '<span class="badge badge-danger">Declined</span>';
    if($status == 'pending') return '<span class="badge badge-warning">Pending</span>';
}


function naira(){
    return '&#8358;';
}


function inCart($id, $type='course'){
    $cart =  session()->get('cart');
    if($cart == null) return false;
    if(array_element_exists($cart, $id, $type)){
        return true;
    }else{
        return false;
    }
}

function countInCart(){
    $cart =  session()->get('cart');
    if($cart == null) return 0;
    return count($cart);
}

function getCart(){
    return session()->get('cart');
}

function getYoutubeEmbedUrl($url)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function randomIcons(){
    $rand = rand(1,20);

    $icons =
    [
        [
            "icon" => "uil-compress",
            "color" => "#f56161",
            "background" => "#3caea3"
        ],
        [
            "icon" => "uil-compress-alt-left",
            "color" => "#3caea3",
            "background" => "#9b59b6"
        ],
        [
            "icon" => "uil-eye",
            "color" => "#9b59b6",
            "background" => "#f1c40f"
        ],
        [
            "icon" => "uil-clock-eight",
            "color" => "#f1c40f",
            "background" => "#e74c3c"
        ],
        [
            "icon" => "uil-apps",
            "color" => "#e74c3c",
            "background" => "#2980b9"
        ],

        //


        [
            "icon" => "uil-align-left-justify",
            "color" => "#2980b9",
            "background" => "#27ae60"
        ],
        [
            "icon" => "uil-bolt",
            "color" => "#e67e22",
            "background" => "#2c3e50"
        ],
        [
            "icon" => "uil-cancel",
            "color" => "#2c3e50",
            "background" => "#d35400"
        ],

        [
            "icon" => "uil-clipboard",
            "color" => "#d35400",
            "background" => "#1abc9c"
        ],
        [
            "icon" => "uil-copy",
            "color" => "#1abc9c",
            "background" => "#8e44ad"
        ],
        [
            "icon" => "uil-envelope",
            "color" => "#8e44ad",
            "background" => "#f39c12"
        ],

        //


        [
            "icon" => "uil-database",
            "color" => "#f39c12",
            "background" => "#e74c3c"
        ],
        [
            "icon" => "uil-mars",
            "color" => "#e74c3c",
            "background" => "#9b59b6"
        ],


        //

        [
            "icon" => "uil-music",
            "color" => "#f39c12",
            "background" => "#e74c3c"
        ],
        [
            "icon" => "uil-plane-fly",
            "color" => "#e74c3c",
            "background" => "#9b59b6"
        ],

        [
            "icon" => "uil-tag",
            "color" => "#f39c12",
            "background" => "#e74c3c"
        ],
        [
            "icon" => "uil-tear",
            "color" => "#e74c3c",
            "background" => "#9b59b6"
        ],


        [
            "icon" => "uil-user-circle",
            "color" => "#e67e22",
            "background" => "#2c3e50"
        ],
        [
            "icon" => "uil-tear",
            "color" => "#2c3e50",
            "background" => "#d35400"
        ],

        [
            "icon" => "uil-windsock",
            "color" => "#d35400",
            "background" => "#1abc9c"
        ],

        [
            "icon" => "uil-music",
            "color" => "#f39c12",
            "background" => "#e74c3c"
        ],
    ];

    return $icons[$rand];
}

function array_element_exists($array, $id, $type) {

    if($array != null){
        foreach ($array as $element) {
            if ($element['id'] == $id && $element['type'] == $type) {
                return true;
            }
        }
        return false;
    }else{
        return false;
    }
}



?>
