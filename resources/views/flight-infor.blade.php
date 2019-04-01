@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
                <h3>Flight Information</h3>
                <div class="panel panel-default">
                    <p>
                        @if(session()->has('success'))
                            <p style="color:green">{{session('success')}}</p>
                        @endif
                    </p>
                    <p>
                        @if(session()->has('errorND'))
                            <p style="color:green">{{session('errorND')}}</p>
                        @endif
                    </p>
                    <div class="panel-body">
                        <form role="form" action="{{route('flight_infor')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="form-heading">1. Flight Destination</h4>
                                    <div class="form-group">
                                        <label class="control-label">From: </label>
                                        <select class="form-control" name="from" id="from">
                                            {{--<option value="1">TP. Hồ Chí Minh (SGN)</option>--}}
                                            {{--<option value="2">Hà Nội (HAN)</option>--}}
                                            @foreach ($cities as $city)
                                                <option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name']. " (" .$city['city_code'] . ")"; ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">To: </label>
                                        <select class="form-control" name="to" id="to">
                                            @foreach ($cities as $city)
                                                <option value="<?php echo $city['city_id'];?>"><?php echo $city['city_name']. " (" .$city['city_code'] . ")"; ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ariline:</label>
                                        <select class="form-control" name="air" id="ari">
                                            @foreach ($airlines as $airline)
                                                <option value="<?php echo $airline['airline_id'];?>"><?php echo $airline['airline_name']; ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Airline code:</label>
                                        <input id="code" name="code" type="text" class="form-control" placeholder="Input airline code">
                                        @if($errors->has('code'))
                                            <p style="color:red">{{$errors->first('code')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">2. Date of Flight</h4>
                                    <div class="form-group">
                                        <label class="control-label">Departure: </label>
                                        <input id="departure" name="departure" type="date" class="form-control" placeholder="Choose Departure Date">
                                        @if($errors->has('departure'))
                                            <p style="color:red">{{$errors->first('departure')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Return: </label>
                                        <input id="return_day" name="return_day" type="date" class="form-control" placeholder="Choose Return Date">
                                        @if($errors->has('return_day'))
                                            <p style="color:red">{{$errors->first('return_day')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Landing: </label>
                                        <input id="landing" name="landing" type="date" class="form-control" placeholder="Choose Landing Date">
                                        @if($errors->has('landing'))
                                            <p style="color:red">{{$errors->first('landing')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">3. Search Flights</h4>
                                    <div class="form-group">
                                        <label class="control-label">Total Person: </label>
                                        <input id="total_person" name="total_person" type="text" class="form-control" placeholder="Input total person">
                                        @if($errors->has('total_person'))
                                            <p style="color:red">{{$errors->first('total_person')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Flight Class: </label>
                                        <select id="flight_class" name="flight_class" class="form-control">
                                            <option value="1">Economy</option>
                                            <option value="2">Business</option>
                                            <option value="3">Premium Economy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Cost: </label>
                                        <input id="cost" name="cost" type="text" class="form-control" placeholder="Input total person">
                                        @if($errors->has('cost'))
                                            <p style="color:red">{{$errors->first('cost')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="btnCreate">Create Flights</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
