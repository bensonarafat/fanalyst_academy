<div class="title478">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>ACCA</h2>
            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
            <p>
                The ACCA (Association of Chartered Certified Accountants) is a highly regarded and globally
                recognized professional accountancy qualification. With its rigorous curriculum and focus on both
                theory and practical application, the ACCA is an excellent choice for anyone looking to build a
                successful career in finance. At Fanalyst Academy, we are proud to offer tuition and support for
                individuals looking to sit the ACCA exams.
            </p>

            <p>
                Benefits of the ACCA qualification
                <ul class="ntt125 mtl145">
                    <li>Widely recognized and respected by employers around the world</li>
                    <li>Offers a broad and in-depth education in accounting, finance, and business</li>
                    <li>Develops practical skills and knowledge that can be applied in real-world situations</li>
                    <li>Improves earning potential and career prospects</li>
                    <li>Provides a strong foundation for further professional development</li>
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
                    Our ACCA tuition covers all aspects of the ACCA syllabus, ensuring that you have a thorough
                    understanding of the material. Our experienced tutors use a variety of teaching methods to make the
                    learning process engaging and effective, including:
                    <ul  class="ntt125 mtl145">
                        <li>Video lectures</li>
                        <li>Interactive online quizzes and assessments</li>
                        <li>Live class sessions</li>
                        <li>Practice exams</li>
                        <li>One-to-one support from tutors</li>
                    </ul>
                </p>
                <p>
                    The course is designed to be flexible, so you can study at your own pace and fit your learning around
                    your work and personal commitments. Our online platform provides 24/7 access to all course
                    materials, so you can revise whenever and wherever you like.
                </p>

                <p>
                    Live class sessions
                </p>
                <p>
                    In addition to our online platform, we also offer live class sessions for our ACCA students. These
                    sessions provide an opportunity to ask questions and receive personalised support from our tutors. Our
                    live class sessions are held at regular intervals and are included in the cost of your course.
                </p>
                <p>
                    Why choose Fanalyst Academy for your ACCA studies?
                    <ul class="ntt125 mtl145">
                        <li>Experienced tutors with a proven track record of success</li>
                        <li>A flexible, online learning platform</li>
                        <li>Live class sessions for additional support</li>
                        <li>Comprehensive course materials that cover all aspects of the ACCA syllabus</li>
                        <li>Access to our student support team for any questions or concerns</li>
                    </ul>
                </p>
                <p>
                    Start your ACCA journey today with Fanalyst Academy and take the first step towards a successful
                    career in finance.
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
                <img src="{{ asset('assets/images/explore/2.jpg') }}" style="width:400px;" alt="">
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
