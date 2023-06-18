@extends('layouts.app')
@section('title', 'Cart')
@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title126">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="mb4d25">
        <div class="container">
            @include('components.alert')

            @if(getCart())
            <div class="row">
                <div class="col-lg-8">
                    @php
                        $amount = 0.00;
                        $discount = 0.00;
                        $total = 0.00;
                    @endphp
                    @for ($i = 0; $i < count(getCart()); $i++)
                    @php
                        $carts = getCart();
                        if($carts[$i]['type'] == "quiz") {
                            $question = \App\Models\Question::find($carts[$i]["id"]);
                            $topic =  \App\Models\Topic::find($question->topicid);
                            $user =  \App\Models\User::find($question->userid);
                        }else{
                            $course = \App\Models\Course::find($carts[$i]["id"]);
                            $user = \App\Models\User::find($course->instructor);
                        }

                    @endphp
                    <div class="fcrse_1">
                        @if ($carts[$i]['type'] == "quiz")
                            <a href="" class="hf_img">
                                <img class="cart_img" style="width:100%;height:150px;object-fit:cover;" src="{{ asset($topic->image) }}" alt="" />
                            </a>
                            <div class="hs_content">
                                <div class="eps_dots eps_dots10 more_dropdown">
                                    <a href="/remove-line-cart/{{ $question->id }}/quiz"><i class="uil uil-times"></i></a>
                                </div>
                                <a href="" class="crse14s title900 pt-2">{{ $question->name }}</a>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                    <div class="prce142">{!! naira() . number_format($question->price, 2)  !!}</div>
                                </div>
                            </div>
                            @php
                                $amount += $question->price;
                                $grand = $amount;
                            @endphp
                        @else
                            <a href="{{ route('view.course', $course->id) }}" class="hf_img">
                                <img class="cart_img" style="width:100%;height:150px;object-fit:cover;" src="{{ asset($course->media_thumbnail) }}" alt="" />
                            </a>
                            <div class="hs_content">
                                <div class="eps_dots eps_dots10 more_dropdown">
                                    <a href="/remove-line-cart/{{ $course->id }}/course"><i class="uil uil-times"></i></a>
                                </div>
                                <a href="{{ route('view.course', $course->id) }}" class="crse14s title900 pt-2">{{ $course->title }}</a>
                                <a href="#" class="crse-cate">{{ $course->short_description }}</a>
                                <div class="auth1lnkprce">
                                    <p class="cr1fot">By <a href="#">{{ $user->fullname }}</a></p>
                                    <div class="prce142">{!! naira() . number_format($course->amount, 2)  !!}</div>
                                </div>
                            </div>
                            @php
                                $amount += $course->amount;
                                $discount += $course->discount;
                                $grand = $amount - $discount;
                            @endphp
                        @endif

                    </div>

                    @endfor

                </div>
                <div class="col-lg-4">
                    <div class="membership_chk_bg rght1528">
                        <div class="checkout_title">
                            <h4>Total</h4>
                            <img src="{{ asset('assets/images/line.svg') }}" alt="" />
                        </div>
                        <div class="order_dt_section">
                            <div class="order_title">
                                <h4>Orignal Price</h4>
                                <div class="order_price">{!! naira() . number_format($amount, 2)  !!}</div>
                            </div>
                            <div class="order_title">
                                <h6>Discount Price</h6>
                                <div class="order_price">{!! naira() . number_format($discount, 2)  !!}</div>
                            </div>
                            <div class="order_title">
                                <h2>Total</h2>
                                <div class="order_price5">{!! naira() . number_format(($amount - $discount), 2)  !!}</div>
                            </div>
                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}" />
                                <input type="hidden" name="orderID" value="345">
                                <input type="hidden" name="amount" value="{{ $grand * 100 }}"> {{-- required in kobo --}}
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['userid' =>  auth()->user()->id,])}}" >
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                @csrf
                                <button style="submit" class="chck-btn22">Checkout Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h1>No Item in the Cart</h1>
            @endif
        </div>
    </div>
    @include('components.footer')
</div>
@endsection
