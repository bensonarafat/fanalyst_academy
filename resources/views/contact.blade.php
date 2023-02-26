@extends('layouts.main')
@section('title', "Contact")
@section('content')
@section('description', 'Contact Us')
@section('url', config('app.url') . '/contact' )
@section('image', asset('assets/images/logo.png') )

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
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="title126">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact1256">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                        <div class="title126">
                            <p>Send us a message and we'll get back to you very soon</p>
                        </div>

                        @include('components.alert')
                    <form action="{{ route('send.contact') }}" method="POST">
                        @csrf
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh95">
                                <input class="prompt srch_explore" type="text" name="name" value=""  required="" placeholder="Full name" />
                            </div>
                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh95">
                                <input class="prompt srch_explore" type="email" name="email" value="" required="" placeholder="Email Address" />
                            </div>
                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh95">
                                <input class="prompt srch_explore" type="tel" name="phone" value="" required="" placeholder="Telephone" />
                            </div>
                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh95">
                                <input class="prompt srch_explore" type="text" name="subject" value="" required="" placeholder="Subject" />
                            </div>
                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh95">
                                <textarea name="message" id="message" class="form-control" placeholder="Message" cols="100" rows="3"></textarea>
                            </div>
                        </div>
                        <button class="login-btn" type="submit">Send</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact_info">
                        <ul class="contact_list_info">
                            <li>
                                <div class="txt_cntct">
                                    <span class="cntct_895"><i class="uil uil-envelope"></i>Email:</span>
                                    <p><a class="mailto:support@fanalystacademy.org">support@fanalystacademy.org</p>
                                </div>
                            </li>
                            <li>
                                <div class="txt_cntct">
                                    <span class="cntct_895"><i class="uil uil-mobile-android-alt"></i>Phone :</span>
                                    <p><a href="tel:+2348089990192">08089990192</a></p>
                                </div>
                            </li>
                        </ul>
                        <div class="edututs_links_social">
                            <ul class="tutor_social_links">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100089973412155&mibextid=ZbWKwL" class="fb"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/FanalystAcademy?t=JsmagNpS81tamFyVL0IYvA&s=08" class="tw"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/fanalyst-academy/" class="ln"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/fanalystacademy?igshid=YmMyMTA2M2Y=" class="yu"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('components.footer')
</div>

@endsection
