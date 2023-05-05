<div class="drawer">
    <!-- Backdrop -->
    <div class="drawer__overlay"></div>
    <div class="drawer__close">
        <i class="uil uil-times"></i>
    </div>
    <!-- Sidebar -->
    <div class="drawer__sidebar">
        <div class="px-2">
            <div class="my-2">
                <a href="{{ route("login") }}" style="font-weight: 500;"> Login </a>
            </div>
            <div class="my-2">
                <a href="{{ route("register") }}" style="font-weight: 500;"> Register </a>
            </div>
            <div class="my-2">
                <a href="/register?tutor=true" style="font-weight: 500;">  Start Teaching </a>
            </div>
        </div>
        <hr>
        <div class="px-2 py-2">
            <div class="">
                <h6>Categories</h6>
            </div>
            @foreach (appcategories() as $row)
                <div class="my-3" >
                    <a href="/category/cat/{{ $row->id }}" style="font-weight: 500;display:flex;justify-content:space-between;"><span style="color: rgb(54, 54, 54);">{{ $row->name  }}</span> <i class="uil uil-angle-right icon icon2"></i></a>
                </div>
            @endforeach
        </div>
    </div>
</div>
