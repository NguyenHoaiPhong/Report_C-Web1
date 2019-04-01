@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h2>Log in to your account</h2>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form role="form" action="{{route('log_in')}}" method="post">
                                {{csrf_field()}}
                                @if($errors->has('errorlogin'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('errorlogin')}}
                                    </div>
                                @endif
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <p style="color:red">{{$errors->first('email')}}</p>
                                    </div>
                                @endif
                                @if($errors->has('password'))
                                    <div class="alert alert-danger">
                                        <p style="color:red">{{$errors->first('password')}}</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Email Address:</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter your email address">

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password:</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">

                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection