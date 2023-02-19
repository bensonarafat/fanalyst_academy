<div class="title478">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>PERSONAL FINANCE</h2>
            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
            <h3>Master Your Personal Finances with Fanalyst Academy</h3>
            <p>
                No matter your background, education, or current financial situation, managing your finances
                effectively is essential for leading a happy and secure life. At Fanalyst Academy, we believe that
                everyone should have access to the knowledge and skills needed to achieve their financial goals.
            </p>
            <p>Why Choose Personal Finance?</p>
            <p>
                Investing in your personal finance education can help you to:
                <ul class="ntt125 mtl145">
                    <li>Build wealth and create financial security</li>
                    <li>Make informed decisions about spending, saving, and investing</li>
                    <li>Reduce debt and minimize financial stress</li>
                    <li>Achieve your long-term financial goals</li>
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
                    Our Personal Finance Program
                </p>
                <p>
                    At Fanalyst Academy, we&#39;ve designed a comprehensive personal finance course that covers all the
                    essential concepts and tools you need to achieve financial success. Our program covers topics such as
                    budgeting, saving, investing, retirement planning, tax planning, and risk management.

                </p>
                <p>
                    Our course materials include engaging video lectures, interactive online quizzes and assessments, and
                    a wealth of practical examples and case studies. Our online platform provides 24/7 access to all course
                    materials, so you can study at your own pace and fit your learning around your work and personal
                    commitments.
                </p>

                <p>
                    Live Class Sessions
                </p>
                <p>
                    In addition to our comprehensive online course materials, we also offer live class sessions for our
                    Personal Finance students. These sessions provide an opportunity for you to ask questions, receive
                    personalized support, and connect with your peers. Our live class sessions are held at regular intervals
                    and are included in the cost of your course.
                </p>
                <p>
                    Choose Fanalyst Academy for Your Personal Finance Success
                </p>
                <p>
                    At Fanalyst Academy, we are committed to helping you achieve your personal finance goals. Our
                    program includes:
                    <ul class="ntt125 mtl145">
                        <li>Expert tutors with extensive experience in personal finance</li>
                        <li>A flexible, online learning platform that provides 24/7 access to course materials</li>
                        <li>Live class sessions for personalized support and interaction with peers</li>
                        <li>Comprehensive course materials that cover all aspects of the ICAN program</li>
                        <li>Dedicated student support team to assist with any questions or concerns</li>
                    </ul>
                </p>
                <p>
                    Start your personal finance journey with Fanalyst Academy today and gain the knowledge and skills
                    you need to take control of your financial future. Whether you&#39;re looking to get out of debt, save for a
                    major purchase, or plan for retirement, our Personal Finance program has you covered!
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
                <img src="{{ asset('assets/images/explore/6.jpg') }}" style="width:400px;" alt="">
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
