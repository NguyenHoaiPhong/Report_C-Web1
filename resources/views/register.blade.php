@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h2>Join as a Wordskills Travel Member</h2>
                    <p>
                    @if(session()->has('success'))
                        <p style="color:green">{{session('success')}}</p>
                        @endif
                        </p>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" action="{{route('register')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">Email Address:</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address">
                                    @if($errors->has('email'))
                                            <p style="color:red">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
                                    @if($errors->has('password'))
                                        <p style="color:red">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter your name">
                                    @if($errors->has('name'))
                                        <p style="color:red">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone Number:</label>
                                    <input id="tel" name="tel" type="tel" class="form-control" placeholder="Enter your phone number">
                                    @if($errors->has('tel'))
                                        <p style="color:red">{{$errors->first('tel')}}</p>
                                    @endif
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection