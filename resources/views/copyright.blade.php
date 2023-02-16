<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, shrink-to-fit=9" />
        <meta name="description" content="Fanalyst Academy" />
        <meta name="author" content="Benson Arafat" />

        <title>Copyright and Trademark Policy</title>

        <link rel="icon" type="image/png" href="{{ asset("assets/images/fav.png") }} " />

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/unicons-2.0.1/css/unicons.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/vertical-responsive-menu.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/css/responsive.css") }}" rel="stylesheet" />
        {{-- <link href="{{  asset('assets/css/vertical-responsive-menu1.min.css') }}" rel="stylesheet" /> --}}
        <link href="{{ asset('assets/css/instructor-dashboard.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/instructor-responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/jquery-steps.css') }}" rel="stylesheet" />

        <link href="{{ asset("assets/css/night-mode.css") }}" rel="stylesheet" />

        <link href="{{ asset("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.carousel.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/OwlCarousel/assets/owl.theme.default.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/vendor/semantic/semantic.min.css") }}" />
        <link rel="stylesheet" href="{{ asset("assets/css/reset.css") }}">
        <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
        <x-head.tinymce-config/>
    </head>

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
            <a href="/"><img src="{{ asset("assets/images/logo.png") }}" alt="" /></a>
            <a href="/"><img class="logo-inverse" src="{{ asset("assets/images/ct_logo.png") }}" alt="" /></a>
        </div>
        @auth
        <div class="top-category">
            <div class="ui compact menu cate-dpdwn">
                <div class="ui simple dropdown item">
                    <a href="#" class="option_links p-0" title="categories"><i class="uil uil-apps"></i></a>
                    <div class="menu dropdown_category5">
                        @foreach (appcategories() as $row)
                        <a href="/category/cat/{{ $row->id }}" class="item channel_item">{{ $row->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @endauth
        <div class="search120">
            <div class="ui search">
                <div class="ui left icon input swdh10">
                    <input class="prompt srch10" type="text" placeholder="Search for Videos, Tutors, and lectures.." />
                    <i class="uil uil-search-alt icon icon1"></i>
                </div>
            </div>
        </div>
        <div class="header_right">
            <ul>
                @guest
                    <li class="nav__other">
                        <a href="/">Home</a>
                    </li>
                    <li class="nav__other">
                        <a href="{{ route("about") }}">About Us</a>
                    </li>
                    <li class="nav__other">
                        <a href="{{ route("students") }}">Students</a>
                    </li>
                    <li class="nav__other nav__last">
                        <a href="{{ route("lectures") }}">Lectures</a>
                    </li>
                    {{-- <li class="nav__other nav__last">
                        <a href="{{ route("contact") }}" >Contact Us</a>
                    </li> --}}
                @endguest

                @auth
                    <li>
                       @if(auth()->user()->type == "student")
                        @if(auth()->user()->instructor_status == 'pending')
                            <a href="#" class="upload_btn" title="Create New Course">Instructor Application Pending</a>
                        @endif
                        @if(auth()->user()->instructor_status == 'unapplied')
                            <a href="{{ route('instructor.application') }}" class="upload_btn" title="Create New Course">Start Teaching</a>
                        @endif
                        @if(auth()->user()->instructor_status == 'declined')
                            <a href="{{ route('instructor.application') }}" class="upload_btn" title="Create New Course">Instructor Declined</a>
                        @endif

                       @else
                       <a href="{{ route('create.course') }}" class="upload_btn" title="Create New Course">Create New Course</a>
                       @endif
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route("login") }}" class="upload_btn" title="Login">Login</a>
                    </li>
                    <li>
                        <a href="{{ route("register") }}" class="upload_btn" title="Register">Register</a>
                    </li>
                @endguest

                @auth
                    <li>
                        <a href="{{ route('cart') }}" class="option_links" title="cart"><i class="uil uil-shopping-cart-alt"></i><span class="noti_count">{{ countInCart() }}</span></a>
                    </li>
                    {{-- <li class="ui dropdown">
                        <a href="{{ route('notifications') }}" class="option_links" title="Notifications"><i class="uil uil-bell"></i><span class="noti_count">3</span></a>
                    </li> --}}
                    <li class="ui dropdown">
                        <a href="#" class="opts_account" title="Account">
                            <img src="@if(auth()->user()->photo) {{ asset(auth()->user()->photo) }} @else {{ asset("assets/images/hd_dp.jpg") }} @endif" alt="" />
                        </a>
                        <div class="menu dropdown_account">
                            <div class="channel_my">
                                <div class="profile_link">
                                    <img src="@if(auth()->user()->photo) {{ asset(auth()->user()->photo) }} @else {{ asset("assets/images/hd_dp.jpg") }} @endif" alt="{{ auth()->user()->fullname }}" />
                                    <div class="pd_content">
                                        <div class="rhte85">
                                            <h6>{{ auth()->user()->fullname }}</h6>
                                            <div class="mef78" title="Verify">
                                                <i class="uil uil-check-circle"></i>
                                            </div>
                                        </div>
                                        <span><a href="" class="__cf_email__">{{ auth()->user()->email }}</a></span>
                                    </div>
                                </div>
                                <a href="#l" class="dp_link_12">View Profile</a>
                            </div>
                            <div class="night_mode_switch__btn">
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="uil uil-moon"></i> Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </div>
                            <a href="{{ route('settings') }}" class="item channel_item">Settingss</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="item channel_item">Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
        </div>
    </header>

    <div class="wrapper _bg4586 _new89">
        <div class="_215b15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title125">
                            <div class="titleleft">
                                <div class="ttl121">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Copyright and Trademark Policy</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="titleright">
                                <div class="explore_search">
                                    <div class="ui search focus">
                                        <div class="ui left icon input swdh11 swdh15">
                                            <input class="prompt srch_explore" type="text" placeholder="Search" />
                                            <i class="uil uil-search-alt icon icon2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title126">
                            <h2>Copyright and Trademark Policy</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq1256">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="fcrse_3 frc123">
                            <ul class="ttrm15">
                                <li><a href="{{ route('copyright') }}" class="tt_item active">Copyright and Trademark Policy</a></li>
                                <li><a href="{{ route('instructor.agreement') }}" class="tt_item">Instructor Agreement</a></li>
                                <li><a href="#" class="tt_item">Cookie Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="vew120 frc123">
                            <div class="atlink">These Copyright of Use <strong>("Copyright and Trademark Policy")</strong> were last updated on Feb 16th, 2023.</div>
                            <p>
                                Fanalyst is a learning platform that allows individuals from any place in the world to share
                                educational courses. We are open to hosting many courses on our learning marketplace and our
                                marketplace model means we neither review/edit nor determine the legality of courses posted,
                                submitted or shared on our platform. However, we uphold that instructors must not infringe on
                                the intellectual property rights of others.
                            </p>
                            <p class="mt-4">
                                As an instructor on Fanalyst, you agree not to infringe on the intellectual rights of others and that
                                as you post any course, you are making a promise that you have the necessary authorisation or
                                rights to use all the content in the course.
                            </p>
                            <p class="mt-4">
                                For clarity, infringing activity is strongly prohibited on our platform.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Infringement Report by Third-Party</h4>
                            <p class="mt-4">
                                Fanalyst’s will remove courses from the platform when they have been reported as infringing by
                                the owner of the original content. In the event where an instructor receives more than two
                                copyright infringement notices, all their courses will be removed from the platform. Fanalyst
                                have the right to terminate the account of an instructor at any point especially when they post
                                content that violates the copyright of others.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Filing an Infringement Report</h4>
                            <p class="mt-4">
                                If you are the owner or designated agent of the owner of a copyrighted content you believe a
                                course on our platform is infringing and want to file a report, here are things to consider:
                            </p>
                            <ol class="ntt125 mtl145">
                                <li>
                                    We will not process a copyright claim that is not filed by the owner of the original work
                                    or their designated agent. This is because we have to ascertain whether our instructor
                                    received proper permission from the owner of the content. We will request for a signature
                                    to affirm your right to the content or authority to represent the owner of the content.
                                </li>
                                <li>
                                    You have to adequately substantiate your claim for us to be able to address it;
                                    <ul class="ntt125 mtl145">
                                        <li>
                                            By providing sufficient contact information, including your full legal name, an
                                            email address, physical address, and (optional) telephone number.
                                        </li>
                                        <li>
                                            In the case of representing an organisation, you provide the name of the
                                            organisation and your role or relationship to the organisation.
                                        </li>
                                        <li>
                                            Specifically identify the original content or contents by providing an annotated
                                            representative list including the URL where the material can be found on Fanalyst
                                            website and other website from which it was allegedly copied. Include the name
                                            of the course and the instructor in question.
                                        </li>
                                        <li>
                                            You include a statement declaring that the information in the complaint is
                                            accurate, and under penalty of perjury, you are the authorised owner or authorised
                                            representative of the copyright owner and that you believe in good faith that the
                                            material was not used by the authority of the copyright owner.
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    Deliberately filing a false claim of infringement is illegal and you may be penalised for
                                    damages. Fanalyst reserve the right to seek damages from anyone who filed a falsified
                                    infringement claim in violation of applicable laws
                                </li>
                                <li>
                                    Certain contents such as short phrases (like slogan), intangible concepts (ideas) or facts
                                    are not covered by copyright law. So, before you file a copyright claim, ensure that the
                                    content copied in the course is covered by copyright law.
                                </li>
                                <li>
                                    Determine whether the use of your content is “fair use”. Fair use allows for an exception
                                    for certain uses of copyrighted materials especially when considered to be in public
                                    interest. Fair use covers things like criticism, commentary, news reporting, and research.
                                    In determining if the use of your material is fair use, consider the following:
                                    <ul class="ntt125 mtl145">
                                        <li>
                                            The purpose of using your content (determine if it commercialised or not, whether
                                            it critiques, parodies or transforms your material)
                                        </li>
                                        <li>
                                            The category of your content, whether it is factual or creative.
                                        </li>
                                        <li>
                                            Whether the course uses a small portion as necessary excerpts or substantial
                                            portions of it
                                        </li>
                                        <li>
                                            How it affects the marketability of your material, whether potential buyers would
                                            prefer to purchase the course instead of your material.
                                        </li>
                                    </ul>
                                </li>

                            </ol>
                            <p>
                                Hence, before filing a copyright claim, make sure that the use of your content in the course
                                does not qualify as fair use.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Counter-Notification</h4>
                            <p class="mt-4">
                                Upon receiving a valid copyright violation report, we will forward a copy of the report to the
                                instructor in question, notifying him that;
                            </p>
                            <ul class="ntt125 mtl145">
                                <li>
                                    the course was reported as copied in violation of copyright laws
                                </li>
                                <li>
                                    we are removing the course from Fanalyst platform.
                                </li>
                            </ul>
                            <p class="mt-4">
                                A form will be attached of which the instructor can fill and send back to us as a counter
                                notification. You may send us a counter-notification if you believe that the removal of your
                                course from our platform for alleged infringement is a mistake or that you sought and obtained
                                the permission of the owner of the reported content to use the content in your course.
                            </p>
                            <p class="mt-4">
                                The proper way to issue a counter-notification is by filling in the form we provided to you and
                                sending it back to us through the designated agent or the copyright team member that notified
                                you. Your counter-notification must include the following:
                            </p>

                            <ol class="ntt125 mtl145">
                                <li>
                                    Your physical or electronic signature;
                                </li>
                                <li>
                                    Your name, address, and email address or telephone number,
                                </li>
                                <li>
                                    Identification of the course that was removed and the URL by which your course was
                                    posted on our platform before it was removed. Note that you can access this information
                                    from the copyright infringement report filed against your course since we always attach a
                                    copy when notifying an instructor;
                                </li>
                                <li>
                                    A declaration under penalty of perjury that you believe in good faith that the material was
                                    removed as a result of mistake or misidentification of the material to be removed; and
                                </li>
                                <li>
                                    A statement that you agree to (a) Fanalyst giving the claimant your name and contact
                                    information; (b) receive service of process for any legal action taken by the claimant or
                                    their agent (c) accept the jurisdiction of the federal district court for the judicial district in
                                    which you reside (if in Nigeria).
                                </li>
                            </ol>
                            <p class="mt-4">
                                Deliberately filing a false claim of infringement is illegal and you may be penalised for
                                damages. Fanalyst reserve the right to seek damages from anyone who filed a falsified
                                infringement claim in violation of applicable laws
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Payments, Credits, and Refunds</h4>
                            <p class="mt-4">
                                Morbi lectus nunc, lacinia ut consequat a, semper vel erat. Duis ut lacus nec dui sodales mattis. Mauris tellus dolor, pulvinar sit amet pretium a, malesuada sed tellus. Aliquam ultrices elit neque, quis
                                lacinia ex porttitor non. Donec ac iaculis turpis. Nulla lacinia enim quis orci aliquam, non cursus urna pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                himenaeos. Phasellus in mi a nisi auctor interdum. Vivamus faucibus magna sed elit interdum consequat. Vestibulum eu tortor vel ante feugiat faucibus quis et urna. Quisque interdum ac enim eu tempus.
                                Fusce viverra, lectus egestas tincidunt cursus, tortor sapien convallis metus, vitae auctor risus metus vel nisi. Aenean dapibus bibendum mauris ut iaculis.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Infringement Report from Instructor</h4>
                            <p class="mt-4">
                                We acknowledge that when you make your courses available on the Fanalyst platform, you
                                wouldn’t want to find it offered on another platform without your permission. Fanalyst doesn’t
                                tolerate violation of copyright laws, and will seek out and find instances of copyright
                                infringement and have copied copyrighted content removed from third-party platforms.
                            </p>
                            <p class="mt-4">
                                However, you bear in mind that Fanalyst don’t control the content on other platforms and may
                                find it difficult to have your content removed from an infringing third-party platform especially
                                when the platform is based in a country whose approach to issues on copyright laws differs. In
                                such a case we cannot guarantee the infringing third-party platform will comply with our notices
                                and remove the infringing content.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Trademark Infringement Report by Third-Party</h4>
                            <p class="mt-4">
                                Fanalyst’s policy is to remove courses reported and confirmed as infringing from our platform.
                                Any course that infringes a third-party’s trademark will be removed and we reserve the right to
                                terminate, at any time, the account of the defaulting instructor.
                            </p>
                        </div>
                        <div class="vew120 mt-35 mb-30">
                            <h4>Filing a Trademark Infringement Report</h4>
                            <p class="mt-4">
                                Kindly note that a copy of your trademark infringement report will be sent to the party who
                                posted the content you are reporting. If you are the owner or designated agent of the owner of a
                                trademarked content you believe a course on our platform is infringing and want to file a report,
                                here are things to consider:
                            </p>
                            <ol class="ntt125 mtl145">
                                <li>You have to adequately substantiate your claim for us to be able to address it. It must
                                    substantially include the following:
                                    <ol class="ntt125 mtl145">
                                        <li>Your contact information, including your full legal name, an email address,
                                            physical address, and telephone number.
                                        </li>
                                        <li>
                                            The particular word, symbol, etc. for which you claim trademark rights.
                                        </li>
                                        <li>
                                            Evidence of registration of trademark rights, including registration number, if
                                            applicable.
                                        </li>
                                        <li>
                                            The region or jurisdiction in which you claim trademark rights.
                                        </li>
                                        <li>
                                            The category of items and/or services for which you claim rights.
                                        </li>
                                        <li>
                                            Adequate information on how to locate the trademarked material on Fanalyst
                                            (web addresses/URLs of the allegedly infringing content).
                                        </li>
                                        <li>
                                            A vivid description of how you believe this content infringes your trademark
                                            rights.
                                        </li>
                                        <li>
                                            If you are representing the rights holder or are a designated agent to the rights
                                            holder, indicate your relationship to the rights holder.
                                        </li>
                                        <li>
                                            A statement declaring that the information in the complaint is accurate, and under
                                            penalty of perjury, you are the authorised rights holder or authorised
                                            representative of the rights holder and that you believe in good faith that the
                                            content was not used by the authority of the rights holder.
                                        </li>
                                        <li>
                                            Your electronic or physical signature with your full name.
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    Deliberately filing a false claim of infringement is illegal and you may be penalised for
                                    damages. Fanalyst reserve the right to seek damages from anyone who filed a falsified
                                    trademark infringement claim.
                                </li>
                                <li>
                                    Determine whether the use of you trademark is “fair use”. Most countries’ intellectual
                                    property laws include an exception for “fair use”, which gives others the leverage to use a
                                    trademark for factually referencing the trademarked product or service, or commenting
                                    on or criticizing the trademarked product or services. Hence, before filing a copyright
                                    claim, make sure that use of your trademarked product or services does not qualify as fair use.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>

    <script data-cfasync="false" src="{{ asset("assets/cloudflare-static/email-decode.min.js") }}"></script>
    <script src="{{ asset("assets/js/vertical-responsive-menu.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/OwlCarousel/owl.carousel.js") }}"></script>
    <script src="{{ asset("assets/vendor/semantic/semantic.min.js") }}"></script>
    <script src="{{ asset("assets/js/custom.js") }}"></script>
    <script src="{{ asset('assets/js/custom1.js') }}"></script>
    <script src="{{ asset("assets/js/night-mode.js") }}"></script>
    <script src="{{ asset('assets/js/jquery-steps.min.js') }}"></script>
    <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
    <script>
        $(".add-instructor-tab").steps({
            onFinish: function () {
                $('#instructor-application').submit();
            },
        });

        $("#add-course-tab").steps({
            onFinish: function () {
                $('#course-submittion').submit();
            },
        });
    </script>
    <script>
        $(function () {
            $(".sortable").sortable();
            $(".sortable").disableSelection();
        });
    </script>
</body>

</html>
