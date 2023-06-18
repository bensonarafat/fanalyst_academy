@auth
<nav class="vertical_nav">
    <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
            <ul>
                <li class="menu--item">
                    <a href="/" class="menu--link {{ Request::is('/') ? 'active' : '' }}" title="Home">
                        <i class="uil uil-home-alt menu--icon"></i>
                        <span class="menu--label">Home</span>
                    </a>
                </li>
                @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('analysis') }}" class="menu--link {{ Request::is('/analysis') ? 'active' : '' }}" title="Analyics">
                        <i class="uil uil-analysis menu--icon"></i>
                        <span class="menu--label">Analyics</span>
                    </a>
                </li>
                @endif
                <li class="menu--item">
                    <a href="{{ route('courses') }}" class="menu--link {{ Request::is('courses') ? 'active' : '' }}" title="Courses">
                        <i class="uil uil-book-alt menu--icon"></i>
                        <span class="menu--label">Courses</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="{{ route('messages.index') }}" class="menu--link {{ Request::is('messages') ? 'active' : '' }}" title="Messages">
                        <i class="uil uil-comments menu--icon"></i>
                        <span class="menu--label">Messages</span>
                    </a>
                </li>
                @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('create.course') }}" class="menu--link {{ Request::is('courses/create') ? 'active' : '' }}" title="Create Course">
                        <i class="uil uil-plus-circle menu--icon"></i>
                        <span class="menu--label">Create Course</span>
                    </a>
                </li>
                @endif
                <li class="menu--item">
                    <a href="{{ route('explore') }}" class="menu--link {{ Request::is('explore') ? 'active' : '' }}" title="Explore">
                        <i class="uil uil-search menu--icon"></i>
                        <span class="menu--label">Explore</span>
                    </a>
                </li>
                <li class="menu--item menu--item__has_sub_menu">
                    <label class="menu--link" title="Categories">
                        <i class="uil uil-layers menu--icon"></i>
                        <span class="menu--label">Categories</span>
                    </label>
                    <ul class="sub_menu">
                        @if(auth()->user()->type == "admin")
                        <li class="sub_menu--item">
                            <a href="/category/add" class="sub_menu--link">Add Category</a>
                        </li>
                        @endif
                        @foreach (appCategories() as $row)
                            <li class="sub_menu--item">
                                <a href="/category/cat/{{ $row->id }}" class="sub_menu--link">{{ $row->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu--item menu--item__has_sub_menu">
                    <label class="menu--link" title="Tests">
                        <i class="uil uil-clipboard-alt menu--icon"></i>
                        <span class="menu--label">Quiz</span>
                    </label>
                    <ul class="sub_menu">
                        @if(auth()->user()->type == 'instructor' || auth()->user()->type == "admin" )
                            {{-- <li class="sub_menu--item">
                                <a href="{{ route("quiz.index") }}" class="sub_menu--link">Questions</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="{{ route("import.questions") }}" class="sub_menu--link">Import Questions</a>
                            </li> --}}
                            <li class="sub_menu--item">
                                <a href="{{ route("quiz.index") }}" class="sub_menu--link">Create Quiz</a>
                            </li>
                        @endif
                        <li class="sub_menu--item">
                            <a href="{{ route("take.quiz") }}" class="sub_menu--link">Take Quiz</a>
                        </li>
                        <li class="sub_menu--item">
                            <a href="{{ route('quiz.result') }}" class="sub_menu--link">Quiz Result</a>
                        </li>

                    </ul>
                </li>
                {{-- <li class="menu--item">
                    <a href="{{ route('saved') }}" class="menu--link" title="Saved Courses">
                        <i class="uil uil-heart-alt menu--icon"></i>
                        <span class="menu--label">Saved Courses</span>
                    </a>
                </li> --}}

                {{-- <li class="menu--item">
                    <a href="{{ route('notifications') }}" class="menu--link" title="Notifications">
                        <i class="uil uil-bell menu--icon"></i>
                        <span class="menu--label">Notifications</span>
                    </a>
                </li> --}}

                {{-- @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('reviews') }}" class="menu--link" title="Reviews">
                        <i class="uil uil-star menu--icon"></i>
                        <span class="menu--label">Reviews</span>
                    </a>
                </li>
                @endif --}}
                @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('earnings') }}" class="menu--link" title="Earning">
                        <i class="uil uil-dollar-sign menu--icon"></i>
                        <span class="menu--label">Earnings</span>
                    </a>
                </li>
                @endif
                {{-- @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('payouts') }}" class="menu--link" title="Payout">
                        <i class="uil uil-wallet menu--icon"></i>
                        <span class="menu--label">Payout</span>
                    </a>
                </li>
                @endif --}}
                {{-- @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('statements') }}" class="menu--link" title="Statements">
                        <i class="uil uil-file-alt menu--icon"></i>
                        <span class="menu--label">Statements</span>
                    </a>
                </li>
                @endif --}}


                {{-- @if(auth()->user()->type == 'instructor')
                <li class="menu--item">
                    <a href="{{ route('verifications') }}" class="menu--link" title="Verification">
                        <i class="uil uil-check-circle menu--icon"></i>
                        <span class="menu--label">Verification</span>
                    </a>
                </li>
                @endif --}}

                @if(auth()->user()->type == 'admin')
                <li class="menu--item">
                    <a href="{{ route('users') }}" class="menu--link {{ Request::is('users') ? 'active' : '' }}" title="users">
                        <i class="uil uil-user menu--icon"></i>
                        <span class="menu--label">Users</span>
                    </a>
                </li>
                @endif

                <li class="menu--item">
                    <a href="{{ route('settings') }}" class="menu--link {{ Request::is('settings') ? 'active' : '' }}" title="Setting">
                        <i class="uil uil-cog menu--icon"></i>
                        <span class="menu--label">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="left_footer">
            <ul>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('terms') }}">Terms of use</a>
            </ul>
            <div class="left_footer_content">
                <p>© {{ date('Y') }} <strong>{{ config("app.name") }}</strong>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</nav>
@endauth
