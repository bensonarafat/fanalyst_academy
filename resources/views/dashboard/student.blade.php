<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="section3125 mt-30">
                        <h4 class="item_title">Featured Courses</h4>
                        <a href="{{ route('courses') }}" class="see150">See all</a>
                        <div class="la5lo1">
                            <div class="owl-carousel featured_courses owl-theme">
                                @foreach ($featured as $row)
                                @php
                                    $user = \App\Models\User::find($row->instructor);
                                @endphp
                                    <div class="item">
                                        <div class="fcrse_1 mb-20">
                                            <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                                <img style="width:100%;height:200px;object-fit:cover;" src="{{ asset($row->media_thumbnail) }}" alt="" />
                                                <div class="course-overlay">
                                                </div>
                                            </a>
                                            <div class="fcrse_content">
                                                <div class="vdtodt">
                                                    <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                                </div>
                                                <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>
                                                <div class="auth1lnkprce">
                                                    <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                                    <div class="prce142">
                                                        @if(!$row->is_free)
                                                            FREE
                                                        @else
                                                            {!! naira() . number_format($row->amount, 2) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section3125 mt-30">
                        <h4 class="item_title">Newest Courses</h4>
                        <a href="{{ route('courses') }}" class="see150">See all</a>
                        <div class="la5lo1">
                            <div class="owl-carousel featured_courses owl-theme">
                                @foreach ($courses as $row)
                                @php
                                    $user = \App\Models\User::find($row->instructor);
                                @endphp
                                    <div class="item">
                                        <div class="fcrse_1 mb-20">
                                            <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                                <img style="width:100%;height:200px;object-fit:cover;" src="{{ asset($row->media_thumbnail) }}" alt="" />
                                                <div class="course-overlay">
                                                </div>
                                            </a>
                                            <div class="fcrse_content">
                                                <div class="vdtodt">
                                                    <span class="vdt14">{{ $row->likes }} likes</span>
                                                    <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                                </div>
                                                <a href="{{ route('view.course', $row->id) }}" class="crse14s">{{ $row->title }}</a>

                                                <div class="auth1lnkprce">
                                                    <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                                    <div class="prce142">
                                                        @if(!$row->is_free)
                                                            FREE
                                                        @else
                                                            {!! naira() . number_format($row->amount, 2) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="section3126">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="value_props">
                                    <div class="value_icon">
                                        <i class="uil uil-history"></i>
                                    </div>
                                    <div class="value_content">
                                        <h4>Go at your own pace</h4>
                                        <p>Enjoy lifetime access to courses on {{ config('app.name') }} website</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="value_props">
                                    <div class="value_icon">
                                        <i class="uil uil-user-check"></i>
                                    </div>
                                    <div class="value_content">
                                        <h4>Learn from industry experts</h4>
                                        <p>Select from top instructors around the world</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="value_props">
                                    <div class="value_icon">
                                        <i class="uil uil-play-circle"></i>
                                    </div>
                                    <div class="value_content">
                                        <h4>Find video courses on almost any topic</h4>
                                        <p>Build your library for your career and personal growth</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="value_props">
                                    <div class="value_icon">
                                        <i class="uil uil-presentation-play"></i>
                                    </div>
                                    <div class="value_content">
                                        <h4>100,000 online courses</h4>
                                        <p>Explore a variety of fresh topics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section3125 mt-50">
                        <h4 class="item_title">Popular Instructors</h4>
                        <div class="la5lo1">
                            <div class="owl-carousel top_instrutors owl-theme">
                                @foreach ($instructors as $row)
                                @php
                                    $courses = \App\Models\Course::where(['instructor' => $row->id, 'status' => 'active'])->count();
                                @endphp
                                <div class="item">
                                    <div class="fcrse_1 mb-20">
                                        <div class="tutor_img">
                                            <a href="{{ route('view.user', $row->id) }}"><img src="{{ asset($row->photo) }}" alt="{{ $row->fullname }}" /></a>
                                        </div>
                                        <div class="tutor_content_dt">
                                            <div class="tutor150">
                                                <a href="{{ route('view.user', $row->id) }}" class="tutor_name">{{ $row->fullname }}</a>
                                                <div class="mef78" title="Verify">
                                                    <i class="uil uil-check-circle"></i>
                                                </div>
                                            </div>
                                            <div class="tutor_cate">{{ $row->job_title }}</div>
                                            <ul class="tutor_social_links">
                                                <li>
                                                    <a href="{{ $row->facebook_url }}" class="fb"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $row->twitter_url }}" class="tw"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $row->linkedin_url }}" class="ln"><i class="fab fa-linkedin-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $row->youtube_url }}" class="yu"><i class="fab fa-youtube"></i></a>
                                                </li>
                                            </ul>
                                            <div class="tut1250">
                                                <span class="vdt15">{{ $courses }} Courses</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="right_side">
                        @if(auth()->user()->instructor_status != 'approved')
                        <div class="strttech120">
                            <h4>Become an Instructor</h4>
                            <p>Top instructors from around the world teach millions of students on {{ config('app.name') }}. We provide the tools and skills to teach what you love.</p>
                            @if(auth()->user()->instructor_status == 'pending')
                                <button class="Get_btn"> Pending</button>
                            @endif
                            @if(auth()->user()->instructor_status == 'unapplied')
                                <button class="Get_btn" onclick="window.location.href = '/users/instructor-application';">Start Teaching</button>
                            @endif
                            @if(auth()->user()->instructor_status == 'declined')
                                <button class="Get_btn" onclick="window.location.href = '/users/instructor-application';">Declined</button>
                            @endif
                        </div>
                        @endif
                        <div class="fcrse_3">
                            <div class="cater_ttle">
                                <h4>Top Categories</h4>
                            </div>
                            <ul class="allcate15">
                                @foreach (appCategories(8) as $row)
                                    <li>
                                        <a href="/category/cat/{{ $row->id }}" class="ct_item">{{ $row->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
