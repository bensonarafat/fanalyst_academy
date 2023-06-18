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
                @php
                    $subcategories = App\Models\Category::where("parentid", $row->id)->get();
                @endphp
                <div class="my-3" >
                    <a href="javascript:void(0)" class="__selectCategory" style="font-weight:500;display:flex;justify-content:space-between;"><span style="color: rgb(54, 54, 54);">{{ $row->name  }}</span> <i class="uil uil-angle-right icon icon2"></i></a>
                    <ul style="margin-left: 12px;margin-top: 5px;" class="x-hidden menu-child">
                        @foreach ($subcategories as $y)
                            <li>
                                <a href="/category/cat/{{ $y->id }}">{{ $y->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('.__selectCategory').on("click", function(){

        let _this = $(this);
        let ul = _this.find(".uil");
        if(ul.hasClass("uil-angle-right")){
            ul.removeClass("uil-angle-right");
            ul.addClass("uil-angle-down");
            _this.siblings('.menu-child').removeClass("x-hidden");
            _this.siblings('.menu-child').addClass("y-hidden");
        }else{
            ul.removeClass("uil-angle-down");
            ul.addClass("uil-angle-right");
            _this.siblings('.menu-child').addClass("x-hidden");
            _this.siblings('.menu-child').removeClass("y-hidden");
        }
    });
</script>
