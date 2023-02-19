<div class="title478">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>CFA</h2>
            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
            <p>
                The Chartered Financial Analyst (CFA) designation is a globally recognized standard of excellence in
                investment management, and our comprehensive course is designed to help you achieve this
                prestigious certification.
            </p>
            <p>
                The CFA designation is a valuable asset for anyone pursuing a career in finance. It demonstrates
                mastery of a wide range of investment topics and sets you apart from other professionals in the field.
                With a CFA certification, you can expect:
                <ul class="ntt125 mtl145">
                    <li>Increased earning potential and career advancement opportunities</li>
                    <li>Enhanced professional credibility and reputation</li>
                    <li>A strong foundation for further professional development</li>
                </ul>
            </p>
            <a href="javascript:void(0)" class="bp_right click_more">
                <div class="kslu16">
                    <div class="prevlink1">Read More</div>
                </div>
                <i class="uil uil-angle-double-down"></i>
            </a>

            <div class="x-hidden more" style="margin-top:15px;">


                <p>
                    At Fanalyst Academy, we believe that everyone should have access to high-quality finance education,
                    which is why we&#39;ve created an online learning platform that provides flexible and convenient access
                    to our CFA course. Our course covers all three levels of the CFA program, providing a
                    comprehensive education in investment management.

                </p>
                <p>
                    Our experienced tutors use a variety of teaching methods to make the learning process engaging and
                    effective, including video lectures, interactive online quizzes and assessments, live class sessions,
                    practice exams, and one-to-one support from tutors. Our online platform provides 24/7 access to all
                    course materials, so you can study at your own pace and fit your learning around your work and
                    personal commitments.
                </p>

                <p>
                    Live Class Sessions
                </p>
                <p>
                    We also offer live class sessions for our CFA students. These sessions provide an opportunity to ask
                    questions and receive personalized support from our tutors. Our live class sessions are held at regular
                    intervals and are included in the cost of your course.
                </p>
                <p>
                    Choose Fanalyst Academy for Your CFA Journey
                </p>

                <p>
                    At Fanalyst Academy, we are dedicated to helping you succeed in your CFA journey. We offer:
                    <ul class="ntt125 mtl145">
                        <li>Experienced tutors with a proven track record of success</li>
                        <li>A flexible, online learning platform</li>
                        <li>Live class sessions for additional support</li>
                        <li>Comprehensive course materials that cover all aspects of the CFA program</li>
                        <li>Access to our student support team for any questions or concerns</li>
                    </ul>
                </p>
                <p>
                    Start your CFA journey with Fanalyst Academy today and take the first step towards a successful
                    career in finance. With our expert guidance and support, you will be well-prepared to pass the CFA
                    exams and build a rewarding career in the industry.
                </p>
            </div>
            <a href="javascript:void(0)" class="x-hidden bp_right click_less">
                <div class="kslu16">
                    <div class="prevlink1">Show Less</div>
                </div>
                <i class="uil uil-angle-double-up"></i>
            </a>
            <div style="text-align:center;margin-top:20px;">
                <a href="{{ route("login") }}" class="upload_btn" title="Login">Login</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="secondary">
                <img src="{{ asset('assets/images/explore/3.jpg') }}" style="width:400px;" alt="">
            </div>
        </div>
    </div>
</div>
<style>
    @media only screen and (max-width:767px)
        {
            .secondary {
            display: none;
            }
        }

        .bp_right{
            margin-top:20px;
            float: unset;
            flex-direction: column;
        }
</style>
<script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
<script>
    $('.click_more').on('click', function(){
        let _this = $(this);
        _this.addClass('x-hidden');
        $('.click_less').removeClass('x-hidden');
        $('.more').removeClass('x-hidden');
    });

    $('.click_less').on('click', function(){
        let _this = $(this);
        _this.addClass('x-hidden');
        $('.click_more').removeClass('x-hidden');
        $('.more').addClass('x-hidden');

    })
</script>
