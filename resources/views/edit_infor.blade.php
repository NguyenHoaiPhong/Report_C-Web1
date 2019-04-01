@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h2>Edit Information</h2>
                    <p>
                        @if ($errors->any)
                            @foreach ($errors->all() as $error )
                                <p style="color:red">{{ $error}}</p>
                            @endforeach
                        @endif
                        @if(session()->has('success'))
                            <p style="color:green">{{session('success')}}</p>
                        @endif
                    </p>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="{{route('edt-inf')}}" method="post">
                                    {{csrf_field()}}
                                    @foreach($edtInfors as $edtInfor)
                                    <div class="form-group">
                                        <label class="control-label">Name:</label>
                                        <input id="name" name="name" type="text" value="{{$edtInfor->user_first_name}}" class="form-control" placeholder="Enter your name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password:</label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Phone:</label>
                                        <input id="tel" name="tel" type="tel" value="{{$edtInfor->user_phone}}" class="form-control" placeholder="Enter your phone">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address:</label>
                                        <input id="address" name="address" type="text" value="{{$edtInfor->user_address}}" class="form-control" placeholder="Enter your address">
                                    </div>
                                    @endforeach
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection