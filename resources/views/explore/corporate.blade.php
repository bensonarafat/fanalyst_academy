<div class="title478">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <h2>Corporate Finance</h2>
            <img class="line-title" src="{{ asset('assets/images/line.svg') }}" alt="" />
            <h3>Advance Your Corporate Finance Skills with Fanalyst Academy</h3>
            <p>
                Our comprehensive and expert-led courses designed to help you master the fundamentals of corporate
                finance and advance your career. Whether you are just starting out or looking to advance your skills,
                our courses are designed to meet your needs and help you achieve your goals.
            </p>
            <h3>What is Corporate Finance?</h3>
            <p>
                Corporate finance is the branch of finance that deals with the financial activities of corporations. It
                involves the management of a company&#39;s financial resources to achieve its business objectives and
                maximize shareholder value. Corporate finance professionals work on financial planning and strategy,
                investment decisions, and risk management, among other areas.
            </p>
            <a href="javascript:void(0)" class="bp_right click_more">
                <div class="kslu16">
                    <div class="prevlink1">Read More</div>
                </div>
                <i class="uil uil-angle-double-down"></i>
            </a>
            <div class="x-hidden more" style="margin-top:15px;">
                <h3>Why Study Corporate Finance?</h3>
                <p>
                    Studying corporate finance can help you understand the financial side of business, develop the skills
                    to make informed financial decisions, and advance your career in finance. Whether you are looking to
                    become a financial analyst, investment banker, or CFO, a strong understanding of corporate finance is
                    essential.
                </p>
                <h3>What Will You Learn in Our Corporate Finance Courses?</h3>
                <p>
                    At Fanalyst Academy, we offer a range of corporate finance courses that cover the fundamentals of
                    the subject and advanced topics, such as valuation, mergers and acquisitions, and financial modeling.
                    Our courses are taught by experienced finance professionals and include interactive content, practical
                    exercises, and real-world examples to help you apply your knowledge in the workplace.
                    <ul class="ntt125 mtl145">
                        <li>
                            Introduction to Corporate Finance: In this course, you will learn the basics of corporate
                            finance, including financial statements analysis, financial ratios, and time value of money.
                        </li>
                        <li>
                            Financial Modeling: This course covers the principles of financial modeling and how to use
                            Microsoft Excel to build financial models. You will learn how to create cash flow projections,
                            financial statements, and valuation models.
                        </li>
                        <li>
                            Mergers and Acquisitions: This course covers the key concepts and techniques used in
                            mergers and acquisitions, including deal structure, valuation, and due diligence.
                        </li>
                        <li>
                            Corporate Finance Fundamentals: In this comprehensive course, you will learn the core
                            concepts of corporate finance, including financial planning, investment decisions, and risk
                            management.
                        </li>
                    </ul>
                </p>
                <p>
                    Whether you are a finance professional looking to enhance your skills or a student seeking to build a
                    career in finance, our corporate finance courses have something to offer. Enroll today and start
                    learning from the best!
                </p>

                <p>
                    Get in Touch
                </p>
                <p>
                    If you have any questions about our corporate finance courses, please don&#39;t hesitate to get in touch.
                    Our team of expert instructors is always happy to help.
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
                <img src="{{ asset('assets/images/explore/1.jpg') }}" style="width:400px;" alt="">
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
