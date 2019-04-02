@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
                <h3>Flight Booking</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" action="{{route('flight-list')}}" id = "search">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="form-heading">1. Flight Destination</h4>
                                    <div class="form-group">
                                        <label class="control-label">From: </label>
                                        <select class="form-control" name="from" id="from">
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
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">2. Date of Flight</h4>
                                    <div class="form-group">
                                        <label class="control-label">Departure: </label>
                                        <input id="departure" name="departure" type="date" class="form-control" placeholder="Choose Departure Date">
                                    </div>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label><input id="oneway" type="radio" name="flight_type" checked value="one-way">One Way</label>
                                            <label><input id="return" type="radio" name="flight_type" value="return">Return</label>
                                        </div>
                                    </div>
                                    <div id="returnHiden" class="form-group">
                                        <label class="control-label">Return: </label>
                                        <input id="return_day" name="return_day" type="date" class="form-control" placeholder="Choose Return Date">
                                    </div>
                                    @if($errors->has('errorDate'))
                                        <div class="alert alert-danger">
                                            {{$errors->first('errorDate')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    <h4 class="form-heading">3. Search Flights</h4>
                                    <div class="form-group">
                                        <label class="control-label">Total Person: </label>
                                        <select id="total_person" name="total_person" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        @if($errors->has('errorTotal'))
                                            <p style="color:red">{{$errors->first('errorTotal')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Flight Class: </label>
                                        <select id="flight_class" name="flight_class" class="form-control">
                                            {{--<option value="economy">Economy</option>--}}
                                            {{--<option value="business">Business</option>--}}
                                            {{--<option value="premium-economy">Premium Economy</option>--}}
                                            @foreach ($flight_classes as $flight_class)
                                                <option value="<?php echo $flight_class['fc_id'];?>"><?php echo $flight_class['fc_name']; ?></option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="btnSearch">Search Flights</button>
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
