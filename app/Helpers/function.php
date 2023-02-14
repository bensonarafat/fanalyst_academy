<?php

use App\Models\Category;

function appCategories($limit = null){
    if($limit){
    return Category::latest()->limit($limit)->get();
    }else{
     return Category::latest()->get();
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

?>
