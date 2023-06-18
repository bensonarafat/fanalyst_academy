<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-apps"></i> Dashboard</h2>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card_dash">
                        <div class="card_dash_left">
                            <h5>Total Sales</h5>
                            <h2>{{ $totalSales }}</h2>
                        </div>
                        <div class="card_dash_right">
                            <img src="{{ asset('assets/images/dashboard/achievement.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card_dash">
                        <div class="card_dash_left">
                            <h5>Total Enroll</h5>
                            <h2>{{ $totalEnroll }}</h2>
                        </div>
                        <div class="card_dash_right">
                            <img src="{{ asset('assets/images/dashboard/graduation-cap.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card_dash">
                        <div class="card_dash_left">
                            <h5>Total Courses</h5>
                            <h2>{{ $totalCourse }}</h2>
                        </div>
                        <div class="card_dash_right">
                            <img src="{{ asset('assets/images/dashboard/online-course.svg') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card_dash">
                        <div class="card_dash_left">
                            <h5>Total Students</h5>
                            <h2>{{ $totalStudents }}</h2>
                        </div>
                        <div class="card_dash_right">
                            <img src="{{ asset('assets/images/dashboard/knowledge.svg') }}" alt="" />
                        </div>
                    </div>
                </div>


                @if(auth()->user()->type == 'instructor' || auth()->user()->type == 'admin')
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Course Earnings</h5>
                                <h2>{!! naira() . number_format($courseEarning, 2)  !!}</h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="{{ asset('assets/images/dashboard/achievement.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Quiz Earnings</h5>
                                <h2>{!! naira() . number_format($quizEarning, 2)  !!}</h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="{{ asset('assets/images/dashboard/graduation-cap.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Wallet</h5>
                                <h2>{!! naira() . number_format($wallet->balance, 2) !!}</h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="{{ asset('assets/images/dashboard/promotion.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                @endif


                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Course Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" onclick="window.location.href = '/courses/create';">Create Your Course</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="section3125 mt-50">
                        <h4 class="item_title">Latest Courses performance</h4>
                        <div class="la5lo1">
                            <div class="owl-carousel courses_performance owl-theme">
                                @foreach ($courses as $row)
                                @php
                                    $transactionCount = \App\Models\Transaction::where(['courseid' => $row->id, 'status' =>  'success'])->count();
                                @endphp
                                <div class="item">
                                    <div class="fcrse_1">
                                        <a href="{{ route('view.course', $row->id) }}" class="fcrse_img">
                                            <img src="{{ asset($row->media_thumbnail) }}" alt="" style="width:100%;height:200px;object-fit:cover;"/>
                                            <div class="course-overlay"></div>
                                        </a>
                                        <div class="fcrse_content">
                                            <div class="vdtodt">
                                                <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                            </div>
                                            <a href="{{ route('view.course', $row->id) }}" class="crsedt145">{{ $row->title }}</a>
                                            <div class="allvperf">
                                                <div class="crse-perf-left">Purchased</div>
                                                <div class="crse-perf-right">{{ $transactionCount }}</div>
                                            </div>
                                            <div class="allvperf">
                                                <div class="crse-perf-left">Total Like</div>
                                                <div class="crse-perf-right">{{ $row->likes }}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-clipboard-alt"></i>
                            <h1>Jump into Practice Test Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button class="create_btn_dash" onclick="window.location.href = '/quiz';">Create Your Practice Test</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="section3125 mt-50">
                        <h4 class="item_title">Latest Quiz performance</h4>
                        <div class="la5lo1">
                            <div class="owl-carousel courses_performance owl-theme">
                                @foreach ($quiz as $row)
                                @php
                                    $transactionCount = \App\Models\Transaction::where(['quizid' => $row->id, 'status' =>  'success'])->count();
                                @endphp
                                <div class="item">
                                    <div class="fcrse_1">
                                        <a href="quiz/view/{{ $row->id }}" class="fcrse_img">
                                            <img src="{{ asset($row->image) }}" alt="" style="width:100%;height:200px;object-fit:cover;"/>
                                            <div class="course-overlay"></div>
                                        </a>
                                        <div class="fcrse_content">
                                            <div class="vdtodt">
                                                <span class="vdt14">{{ \Carbon\Carbon::parse($row->created_at)->format('d M, Y') }}</span>
                                            </div>
                                            <a href="quiz/view/{{ $row->id }}" class="crsedt145">{{ $row->name }}</a>
                                            <div class="allvperf">
                                                <div class="crse-perf-left">Purchased</div>
                                                <div class="crse-perf-right">{{ $transactionCount }}</div>
                                            </div>
                                            <div class="allvperf">
                                                <div class="crse-perf-left">Total Like</div>
                                                <div class="crse-perf-right">{{ $row->likes }}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</div>
