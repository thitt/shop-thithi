@extends('frontend.layouts.app_auth')
@section('title', 'Register')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_register.css') }}" />
@endsection

@section('content')
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url({{ asset('img/auth/product_login.jpg') }});"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 py-5">
                        <h3>Register</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" placeholder="e.g. John" id="fname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" placeholder="e.g. Smith" id="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group first">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" placeholder="e.g. john@your-domain.com" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="+00 0000 000 0000" id="lname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group first">
                                        <label for="lname">Website</label>
                                        <input type="text" class="form-control" placeholder="e.g. https://google.com" id="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Your Password" id="password">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group last mb-3">
                                        <label for="re-password">Re-type Password</label>
                                        <input type="password" class="form-control" placeholder="Your Password" id="re-password">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-5 mt-4 align-items-center">
                                <div class="d-flex align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                                        <input type="checkbox" checked="checked"/>
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn px-5 btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
