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


function inCart($id){
    $cart =  session()->get('cart');
    if($cart == null) return false;
    if(in_array($id, $cart)){
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
?>
