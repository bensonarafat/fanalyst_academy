<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, shrink-to-fit=9" />
        <meta name="description" content="Fanalyst Academy" />
        <meta name="author" content="Benson Arafat" />

        <title>@yield("title")</title>

        <link rel="icon" type="image/png" href="{{ asset("assets/images/fav.png") }} " />

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/unicons-2.0.1/css/unicons.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/vertical-responsive-menu.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/responsive.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/night-mode.css") }}" rel="stylesheet" />

        <link href="{{ asset("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.carousel.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.theme.default.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendor/semantic/semantic.min.css") }}" />
    </head>



    <body>

        <header class="header clearfix">
            @auth
                <button type="button" id="toggleMenu" class="toggle_menu">
                    <i class="uil uil-bars"></i>
                </button>
                <button id="collapse_menu" class="collapse_menu">
                    <i class="uil uil-bars collapse_menu--icon"></i>
                    <span class="collapse_menu--label"></span>
                </button>
            @endauth

            <div class="main_logo" id="logo">
                <a href="/"><img src="{{ asset("assets/images/logo.svg") }}" alt="" /></a>
                <a href="/"><img class="logo-inverse" src="{{ asset("assets/images/ct_logo.svg") }}" alt="" /></a>
            </div>
            <div class="top-category">
                <div class="ui compact menu cate-dpdwn">
                    <div class="ui simple dropdown item">
                        <a href="#" class="option_links p-0" title="categories"><i class="uil uil-apps"></i></a>
                        <div class="menu dropdown_category5">
                            <a href="#" class="item channel_item">Development</a>
                            <a href="#" class="item channel_item">Business</a>
                            <a href="#" class="item channel_item">Finance & Accounting</a>
                            <a href="#" class="item channel_item">IT & Software</a>
                            <a href="#" class="item channel_item">Office Productivity</a>
                            <a href="#" class="item channel_item">Personal Development</a>
                            <a href="#" class="item channel_item">Design</a>
                            <a href="#" class="item channel_item">Marketing</a>
                            <a href="#" class="item channel_item">Lifestyle</a>
                            <a href="#" class="item channel_item">Photography</a>
                            <a href="#" class="item channel_item">Health & Fitness</a>
                            <a href="#" class="item channel_item">Music</a>
                            <a href="#" class="item channel_item">Teaching & Academics</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search120">
                <div class="ui search">
                    <div class="ui left icon input swdh10">
                        <input class="prompt srch10" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more.." />
                        <i class="uil uil-search-alt icon icon1"></i>
                    </div>
                </div>
            </div>
            <div class="header_right">
                <ul>
                    <li>
                        <a href="create_new_course.html" class="upload_btn" title="Create New Course">Create New Course</a>
                    </li>
                    <li>
                        <a href="shopping_cart.html" class="option_links" title="cart"><i class="uil uil-shopping-cart-alt"></i><span class="noti_count">2</span></a>
                    </li>
                    <li class="ui dropdown">
                        <a href="#" class="option_links" title="Messages"><i class="uil uil-envelope-alt"></i><span class="noti_count">3</span></a>
                        <div class="menu dropdown_ms">
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-6.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <h6>Zoena Singh</h6>
                                        <p>Hi! Sir, How are you. I ask you one thing please explain it this video price.</p>
                                        <span class="nm_time">2 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-5.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <h6>Joy Dua</h6>
                                        <p>Hello, I paid you video tutorial but did not play error 404.</p>
                                        <span class="nm_time">10 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-8.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <h6>Jass</h6>
                                        <p>Thanks Sir, Such a nice video.</p>
                                        <span class="nm_time">25 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a class="vbm_btn" href="instructor_messages.html">View All <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="ui dropdown">
                        <a href="#" class="option_links" title="Notifications"><i class="uil uil-bell"></i><span class="noti_count">3</span></a>
                        <div class="menu dropdown_mn">
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-1.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <h6>Rock William</h6>
                                        <p>Like Your Comment On Video <strong>How to create sidebar menu</strong>.</p>
                                        <span class="nm_time">2 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-2.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <h6>Jassica Smith</h6>
                                        <p>Added New Review In Video <strong>Full Stack PHP Developer</strong>.</p>
                                        <span class="nm_time">12 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/left-imgs/img-9.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <p>Your Membership Approved <strong>Upload Video</strong>.</p>
                                        <span class="nm_time">20 min ago</span>
                                    </div>
                                </div>
                            </a>
                            <a class="vbm_btn" href="instructor_notifications.html">View All <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="ui dropdown">
                        <a href="#" class="opts_account" title="Account">
                            <img src="{{ asset("assets/images/hd_dp.jpg") }}" alt="" />
                        </a>
                        <div class="menu dropdown_account">
                            <div class="channel_my">
                                <div class="profile_link">
                                    <img src="{{ asset("assets/images/hd_dp.jpg") }}" alt="" />
                                    <div class="pd_content">
                                        <div class="rhte85">
                                            <h6>Joginder Singh</h6>
                                            <div class="mef78" title="Verify">
                                                <i class="uil uil-check-circle"></i>
                                            </div>
                                        </div>
                                        <span><a href="https://gambolthemes.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="89eee8e4ebe6e5b0bdbac9eee4e8e0e5a7eae6e4">[email&#160;protected]</a></span>
                                    </div>
                                </div>
                                <a href="my_instructor_profile_view.html" class="dp_link_12">View Instructor Profile</a>
                            </div>
                            <div class="night_mode_switch__btn">
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="uil uil-moon"></i> Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </div>
                            <a href="instructor_dashboard.html" class="item channel_item">Cursus dashboard</a>
                            <a href="membership.html" class="item channel_item">Paid Memberships</a>
                            <a href="setting.html" class="item channel_item">Setting</a>
                            <a href="help.html" class="item channel_item">Help</a>
                            <a href="feedback.html" class="item channel_item">Send Feedback</a>
                            <a href="sign_in.html" class="item channel_item">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        @auth
            <nav class="vertical_nav">
                <div class="left_section menu_left" id="js-menu">
                    <div class="left_section">
                        <ul>
                            <li class="menu--item">
                                <a href="index.html" class="menu--link active" title="Home">
                                    <i class="uil uil-home-alt menu--icon"></i>
                                    <span class="menu--label">Home</span>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="live_streams.html" class="menu--link" title="Live Streams">
                                    <i class="uil uil-kayak menu--icon"></i>
                                    <span class="menu--label">Live Streams</span>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="explore.html" class="menu--link" title="Explore">
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
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Development</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Business</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Finance & Accounting</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#.html" class="sub_menu--link">IT & Software</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Office Productivity</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Personal Development</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Design</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Marketing</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Lifestyle</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Photography</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Health & Fitness</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Music</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="#" class="sub_menu--link">Teaching & Academics</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu--item menu--item__has_sub_menu">
                                <label class="menu--link" title="Tests">
                                    <i class="uil uil-clipboard-alt menu--icon"></i>
                                    <span class="menu--label">Tests</span>
                                </label>
                                <ul class="sub_menu">
                                    <li class="sub_menu--item">
                                        <a href="certification_center.html" class="sub_menu--link">Certification Center</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="certification_start_form.html" class="sub_menu--link">Certification Fill Form</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="certification_test_view.html" class="sub_menu--link">Test View</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="certification_test__result.html" class="sub_menu--link">Test Result</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="http://www.gambolthemes.net/html-items/edututs+/Instructor_Dashboard/my_certificates.html" class="sub_menu--link">My Certification</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu--item">
                                <a href="saved_courses.html" class="menu--link" title="Saved Courses">
                                    <i class="uil uil-heart-alt menu--icon"></i>
                                    <span class="menu--label">Saved Courses</span>
                                </a>
                            </li>
                            <li class="menu--item menu--item__has_sub_menu">
                                <label class="menu--link" title="Pages">
                                    <i class="uil uil-file menu--icon"></i>
                                    <span class="menu--label">Pages</span>
                                </label>
                                <ul class="sub_menu">
                                    <li class="sub_menu--item">
                                        <a href="about_us.html" class="sub_menu--link">About</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="sign_in.html" class="sub_menu--link">Sign In</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="sign_up.html" class="sub_menu--link">Sign Up</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="sign_up_steps.html" class="sub_menu--link">Sign Up Steps</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="membership.html" class="sub_menu--link">Paid Membership</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="course_detail_view.html" class="sub_menu--link">Course Detail View</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="checkout_membership.html" class="sub_menu--link">Checkout</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="invoice.html" class="sub_menu--link">Invoice</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="career.html" class="sub_menu--link">Career</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="apply_job.html" class="sub_menu--link">Job Apply</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="our_blog.html" class="sub_menu--link">Our Blog</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="blog_single_view.html" class="sub_menu--link">Blog Detail View</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="company_details.html" class="sub_menu--link">Company Details</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="press.html" class="sub_menu--link">Press</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="live_output.html" class="sub_menu--link">Live Stream View</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="add_streaming.html" class="sub_menu--link">Add live Stream</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="search_result.html" class="sub_menu--link">Search Result</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="thank_you.html" class="sub_menu--link">Thank You</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="coming_soon.html" class="sub_menu--link">Coming Soon</a>
                                    </li>
                                    <li class="sub_menu--item">
                                        <a href="error_404.html" class="sub_menu--link">Error 404</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="left_section">
                        <h6 class="left_title">SUBSCRIPTIONS</h6>
                        <ul>
                            <li class="menu--item">
                                <a href="instructor_profile_view.html" class="menu--link user_img">
                                    <img src="{{ asset("assets/images/left-imgs/img-1.jpg") }}" alt="" />
                                    Rock Smith
                                    <div class="alrt_dot"></div>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="instructor_profile_view.html" class="menu--link user_img">
                                    <img src="{{ asset("assets/images/left-imgs/img-2.jpg") }}" alt="" />
                                    Jassica William
                                </a>
                                <div class="alrt_dot"></div>
                            </li>
                            <li class="menu--item">
                                <a href="all_instructor.html" class="menu--link" title="Browse Instructors">
                                    <i class="uil uil-plus-circle menu--icon"></i>
                                    <span class="menu--label">Browse Instructors</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="left_section pt-2">
                        <ul>
                            <li class="menu--item">
                                <a href="setting.html" class="menu--link" title="Setting">
                                    <i class="uil uil-cog menu--icon"></i>
                                    <span class="menu--label">Setting</span>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="help.html" class="menu--link" title="Help">
                                    <i class="uil uil-question-circle menu--icon"></i>
                                    <span class="menu--label">Help</span>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="report_history.html" class="menu--link" title="Report History">
                                    <i class="uil uil-windsock menu--icon"></i>
                                    <span class="menu--label">Report History</span>
                                </a>
                            </li>
                            <li class="menu--item">
                                <a href="feedback.html" class="menu--link" title="Send Feedback">
                                    <i class="uil uil-comment-alt-exclamation menu--icon"></i>
                                    <span class="menu--label">Send Feedback</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="left_footer">
                        <ul>
                            <li><a href="about_us.html">About</a></li>
                            <li><a href="press.html">Press</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                            <li><a href="coming_soon.html">Advertise</a></li>
                            <li><a href="coming_soon.html">Developers</a></li>
                            <li><a href="terms_of_use.html">Copyright</a></li>
                            <li><a href="terms_of_use.html">Privacy Policy</a></li>
                            <li><a href="terms_of_use.html">Terms</a></li>
                        </ul>
                        <div class="left_footer_content">
                            <p>© 2020 <strong>Cursus</strong>. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </nav>
        @endauth


        @yield("content")

        <script data-cfasync="false" src="{{ asset("assets/cloudflare-static/email-decode.min.js") }}"></script>
        <script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/OwlCarousel/owl.carousel.js") }}"></script>
        <script src="{{ asset("assets/vendor/semantic/semantic.min.js") }}"></script>
        <script src="{{ asset("assets/js/custom.js") }}"></script>
        <script src="{{ asset("assets/js/night-mode.js") }}"></script>
    </body>

</html>
