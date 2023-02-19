<div class="title478">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>FRM</h2>
            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
            <p>
                The Financial Risk Manager (FRM) designation is a highly sought-after recognition of expertise in the
                field of financial risk management and our comprehensive course is designed to help you achieve this
                prestigious certification.
            </p>

            <p>
                Why Choose FRM? Earning the FRM certification sets you apart from your peers and demonstrates a
                mastery of a wide range of financial risk management topics. With an FRM designation, you can
                expect:
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
                    Our FRM Program
                </p>
                <p>
                    At Fanalyst Academy, we believe that everyone should have access to high-quality finance education,
                    which is why we&#39;ve created an online learning platform that provides flexible and convenient access
                    to our FRM course. Our course covers all aspects of the FRM program, providing a comprehensive
                    education in financial risk management.

                </p>
                <p>
                    Our team of expert tutors uses a range of teaching methods to ensure that the learning process is both
                    engaging and effective. Our course materials include video lectures, interactive online quizzes and
                    assessments, live class sessions, practice exams, and one-to-one support from tutors. Our online
                    platform provides 24/7 access to all course materials, so you can study at your own pace and fit your
                    learning around your work and personal commitments.
                </p>

                <p>
                    Live Class Sessions
                </p>
                <p>
                    In addition to our comprehensive online course materials, we also offer live class sessions for our
                    FRM students. These sessions provide an opportunity for you to ask questions, receive personalized
                    support, and connect with your peers. Our live class sessions are held at regular intervals and are
                    included in the cost of your course.
                </p>
                <p>
                    Choose Fanalyst Academy for Your FRM Success
                </p>
                <p>
                    At Fanalyst Academy, we are committed to helping you achieve your FRM goals. Our program includes:
                    <ul class="ntt125 mtl145">
                        <li>Expert tutors with extensive experience in financial risk management</li>
                        <li>A flexible, online learning platform that provides 24/7 access to course materials</li>
                        <li>Live class sessions for personalized support and interaction with peers</li>
                        <li>Comprehensive course materials that cover all aspects of the FRM program</li>
                        <li>Dedicated student support team to assist with any questions or concerns</li>
                    </ul>
                </p>
                <p>
                    Start your FRM journey with Fanalyst Academy today and join the ranks of the world&#39;s most highly
                    regarded financial risk management professionals. With our expert guidance and support, you will be
                    well-prepared to pass the FRM exams and build a successful career in this exciting and dynamic field.
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
                <img src="{{ asset('assets/images/explore/5.jpg') }}" style="width:400px;" alt="">
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
