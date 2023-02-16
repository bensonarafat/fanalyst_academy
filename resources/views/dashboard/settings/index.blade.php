@extends('layouts.app')

@section('title', 'Settings')

@section('content')

<div class="wrapper">
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title"><i class="uil uil-cog"></i> Setting</h2>
                    <div class="setting_tabs">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-selected="true">Account</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="pills-bllingpayment-tab" data-toggle="pill" href="#pills-bllingpayment" role="tab" aria-selected="false">Billing and Payouts</a>
                            </li> --}}
                        </ul>
                    </div>
                    @include('components.alert')
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                            <div class="account_setting">
                                <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <h4>Your {{ config('app.name') }} Account</h4>
                                <p>This is your public presence on {{ config('app.name') }}. You need a account to upload your paid courses, comment on courses, purchased by students, or earning.</p>
                                <div class="basic_profile">
                                    <div class="basic_ptitle">
                                        <h4>Basic Profile</h4>
                                        <p>Add information about yourself</p>
                                    </div>
                                    <div class="basic_form">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="fullname" value="{{ auth()->user()->fullname }}" required="" maxlength="64" placeholder="First Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="mobile" name="mobile" value="{{ auth()->user()->mobile }}" required="" placeholder="Mobile" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="date" name="dob" value="{{ auth()->user()->dob }}" required="" placeholder="Date of Birth" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="file" name="photo"/>
                                                                <input type="hidden" name="photospan" value="{{ auth()->user()->photo }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <select name="gender" id="gender" class="form-control" required>
                                                                    <option value=""> -- select gender -- </option>
                                                                    <option value="male" @if(auth()->user()->gender == 'male') selected @endif>Male</option>
                                                                    <option value="female" @if(auth()->user()->gender == 'female') selected @endif>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="town" value="{{ auth()->user()->town }}" required="" placeholder="Town" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="city" value="{{ auth()->user()->city }}" required="" placeholder="City" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="address" value="{{ auth()->user()->address }}" required="" placeholder="Address" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="divider-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basic_profile1">
                                    <div class="basic_ptitle">
                                        <h4>Profile Links</h4>
                                    </div>
                                    <div class="basic_form">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon labeled input swdh11 swdh31">
                                                                <input class="prompt srch_explore" type="text" value="{{ auth()->user()->facebook_url }}" name="facebooklink" id="id_facebook" required="" maxlength="64" placeholder="Facebook Profile" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon labeled input swdh11 swdh31">

                                                                <input class="prompt srch_explore" type="text" value="{{ auth()->user()->twitter_url }}" name="twitterlink" id="id_twitter" required="" maxlength="64" placeholder="Twitter Profile" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon labeled input swdh11 swdh31">

                                                                <input class="prompt srch_explore" type="text" value="{{ auth()->user()->linkedin_url }}"  name="linkedinlink" id="id_linkedin" required="" maxlength="64" placeholder="Linkedin Profile" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon labeled input swdh11 swdh31">

                                                                <input class="prompt srch_explore" type="text" value="{{ auth()->user()->youtube_url }}" name="youtubelink" id="id_youtube" required="" maxlength="64" placeholder="Youtube Profile" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="save_btn" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-bllingpayment" role="tabpanel" aria-labelledby="pills-bllingpayment-tab">
                            <div class="account_setting">
                                <h4>Billing and Payouts</h4>
                                <p>Want to charge for a course? Provide your payment info and opt in for our promotional programs</p>
                                <div class="basic_form">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="basic_ptitle mt-30">
                                                <h4>Billing Address</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="name" value="Joginder" id="id[name1]" required="" maxlength="64" placeholder="First Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="surname" value="Singh" id="id[surname1]" required="" maxlength="64" placeholder="Last Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="academyname" value="Gambolthemes" id="id_academy" required="" maxlength="64" placeholder="Academy Name" />
                                                        </div>
                                                        <div class="help-block">If you want your invoices addressed to a academy. Leave blank to use your full name.</div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input
                                                                class="prompt srch_explore"
                                                                type="text"
                                                                name="addressname"
                                                                value="#1234, Sks Nagar, Near MBD Mall, 141001 Ludhiana, Punjab, India"
                                                                id="id_address1"
                                                                required=""
                                                                maxlength="64"
                                                                placeholder="Address Line 1"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="addressname2" id="id_address2" required="" maxlength="64" placeholder="Address Line 2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="city" value="Ludhiana" id="id_city" required="" maxlength="64" placeholder="City" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="state" value="Punjab" id="id_state" required="" maxlength="64" placeholder="State / Province / Region" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="zip" value="141001" id="id_zip" required="" maxlength="64" placeholder="Zip / Postal Code" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="ui search focus mt-30">
                                                        <div class="ui left icon input swdh11 swdh19">
                                                            <input class="prompt srch_explore" type="text" name="phone" value="+911234567890" id="id_phone" required="" maxlength="12" placeholder="Phone Number" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="save_btn" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
@endsection
