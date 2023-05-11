@extends('layouts.main')
@section('title', "Terms")
@section('description', 'Terms of Use')
@section('url', config('app.url') .'/terms' )
@section('image', asset('assets/images/logo.png') )
@section('content')

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
                                            <li class="breadcrumb-item active" aria-current="page">Terms</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="title126">
                            <h2>@yield('title')</h2>
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
                                <li><a href="{{ route('privacy_policy') }}" class="tt_item active">Privacy Policy</a></li>
                                {{-- <li><a href="{s{ route('instructor.agreement') }}" class="tt_item">Instructor Agreement</a></li> --}}
                                <li><a href="{{ route('cookie') }}" class="tt_item">Cookie Policy</a></li>
                                <li><a href="{{ route('terms') }}" class="tt_item">Terms of use</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="vew120 frc123">
                            <div class="atlink">These Policy of Use <strong>("Terms of Use")</strong> were last updated on May 11th, 2023.</div>
                            <p>
                                Welcome to Fanalyst Academy! Our platform is designed to provide high-quality educational courses and training programs for our users. By accessing or using the Platform, you agree to be bound by these Terms of Use (“Agreement”) and our Privacy Policy. Please read this Agreement carefully before accessing or using the Platform.
                            </p>
                        </div>

                        <div class="vew120 mt-35 mb-30">
                            <strong>Description of Platform</strong>
                            <p>
                                The Platform is an online course and quiz-selling platform that allows Instructors to provide educational content, materials, and instruction (“Courses”) to Users.
                            </p>
                            <strong>Use of Platform</strong>
                            <p>
                                The Platform is intended solely for personal and non-commercial use. You may not use the Platform for any illegal or unauthorized purpose. You agree to comply with all applicable laws and regulations in connection with your use of the Platform. You may not copy, reproduce, distribute, transmit, display, perform, or create derivative works from the Platform or any of its content without prior written permission from the Platform.
                            </p>
                            <strong>
                                User Accounts
                            </strong>
                            <p>
                                To access certain features of the Platform, you may be required to create a user account. You agree to provide accurate and complete information when creating your user account and to update your information as necessary. You are responsible for maintaining the confidentiality of your user account information and all activities that occur under your account. You agree to immediately notify the Platform of any unauthorized use of your user account or any other breach of security.
                            </p>
                            <strong>
                                Course Materials
                            </strong>
                            <p>
                                The courses offered at Fanalyst Academy are provided solely for educational and informational purposes. The Platform does not guarantee the accuracy, completeness, or quality of the Course content. Instructors are solely responsible for the Course content and the Platform is not responsible for any errors or omissions in the Course content. All course materials, including but not limited to videos, images, audio, and text, are the property of Fanalyst Academy or our course instructors and are protected by copyright laws. You may not reproduce, distribute, or modify any course materials without our prior written consent.
                            </p>
                            <strong>
                                Course Enrollment and Payment
                            </strong>
                            <p>
                                To enrol in a course, you must pay the applicable fee, as specified on our website. Payment is processed through our third-party payment processor, and we do not store or have access to your payment information. The Platform is not responsible for any errors or issues with the payment processing service. You agree to pay all fees and charges associated with your use of the Platform, including any applicable taxes. We reserve the right to change our pricing and payment policies at any time, without prior notice.
                            </p>
                            <strong>
                                Course Access and Completion
                            </strong>
                            <p>
                                Once you have enrolled in a course, you will have access to it for the duration specified on our website. You are responsible for completing the course within the specified time frame, and we are not obligated to provide refunds or extensions for any reason. You may not share your account or course materials with anyone else, and any unauthorized use may result in suspension or termination of your account.
                            </p>
                            <strong>
                                User Content
                            </strong>
                            <p>
                                You may be able to submit content, including but not limited to reviews, comments, and questions, on our website. By submitting user content, you grant us a non-exclusive, royalty-free, perpetual, and irrevocable license to use, reproduce, modify, and distribute your content in any form and for any purpose. You represent and warrant that you have the right to submit the content and that it does not infringe on any third-party rights.
                            </p>
                            <strong>
                                Prohibited Conduct
                            </strong>
                            <p>
                                You agree to use our website and courses for lawful purposes only and to not engage in any conduct that may harm our platform, our users, or any third party. Prohibited conduct includes but is not limited to:

                                <ul  class="ntt125 mtl145">
                                    <li>Attempting to access or use another user's account</li>
                                    <li>Distributing viruses or other harmful code</li>
                                    <li>Harassing, threatening, or abusing others</li>
                                    <li>Posting false or misleading information</li>
                                    <li>Engaging in fraudulent activity</li>
                                    <li>Violating any applicable laws or regulations</li>
                                </ul>
                            </p>

                            <strong>
                                Disclaimer of Warranties
                            </strong>
                            <p>
                                We make no representations or warranties, express or implied, regarding the accuracy, reliability, or completeness of any course materials or other content on our website. We do not guarantee that our platform will be error-free, uninterrupted, or secure, and we are not responsible for any damages resulting from the use of our website or courses.
                            </p>

                            <strong>
                                Limitation of Liability
                            </strong>
                            <p>
                                To the extent permitted by law, we will not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with your use of our website or courses, even if we have been advised of the possibility of such damages.
                            </p>

                            <strong>
                                Indemnification
                            </strong>
                            <p>
                                You agree to indemnify and hold us and our affiliates, officers, agents, and employees harmless from any claim or demand, including reasonable attorneys' fees, arising out of or in connection with your use of our website or courses, your violation of these Terms of Use, or your violation of any applicable laws or regulations.
                            </p>

                            <strong>
                                Governing Law and Jurisdiction
                            </strong>
                            <p>
                                These Terms of Use and your use of our website and courses will be governed by and construed in accordance with the laws of the jurisdiction in which we are located, without giving effect to any choice of law or conflict of law provisions. Any legal action or proceeding arising out of or in connection with these Terms of Use or your use of our website or courses must be brought exclusively to the courts located in the jurisdiction in which we are located, and you consent to the personal jurisdiction and venue of such courts.
                            </p>

                            <strong>
                                Modifications
                            </strong>
                            <p>
                                We reserve the right to modify these Terms of Use at any time, without prior notice. Your continued use of our website or courses after any such modifications constitutes your acceptance of the revised Terms of Use.
                            </p>

                            <strong>
                                Termination
                            </strong>
                            <p>
                                We reserve the right to terminate or suspend your account, access to our website or courses, or any portion thereof, at any time and for any reason, without prior notice. Upon termination, your right to use our website or courses will immediately cease, and you must destroy any course materials or other content obtained through your use of our platform.
                            </p>

                            <strong>
                                Dispute Resolution

                            </strong>
                            <p>
                                In the event of any dispute or claim arising out of or relating to these Terms of Use or your use of our website or courses, you agree to first attempt to resolve the dispute informally by contacting us at <a href="mailto:support@fanalystacademy.org">support@fanalystacademy.org.</a>  If we are unable to resolve the dispute informally, either party may initiate binding arbitration as the sole means of resolving the dispute, in accordance with the rules of the arbitration association mutually agreed upon by the parties. The arbitration shall be conducted in the jurisdiction in which we are located. The decision of the arbitrator shall be final and binding, and judgment may be entered upon it in any court having jurisdiction thereof. The prevailing party in any such arbitration shall be entitled to recover its reasonable attorneys' fees and costs incurred in connection with the arbitration. Nothing in this section shall prevent either party from seeking injunctive or other equitable relief in any court of competent jurisdiction.
                            </p>

                            <strong>
                                Waiver and Severability.

                            </strong>
                            <p>
                                The failure of the Platform to enforce any right or provision of this Agreement shall not constitute a waiver of such right or provision. If any provision of this Agreement is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.
                            </p>


                            <strong>
                                Entire Agreement
                            </strong>
                            <p>
                                These Terms of Use, together with our cookie and Privacy Policy, constitute the entire agreement between you and Fanalyst Academy regarding your use of our website and courses and supersede all prior agreements and understandings, whether written or oral.
                            </p>
                            <p>
                                If you have any questions or concerns about these Terms of Use, please contact us at <a href="mailto:support@fanalystacademy.org">support@fanalystacademy.org.</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection

