@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
                @foreach ($flightdetails as $flightdetail)
                <h2>
                    @foreach ($citylists as $city )
                        @if ($city->city_id == $flightdetail->fl_city_from_id)
                            {{$city->city_name . " (". $city->city_code . ")" }}
                        @endif
                    @endforeach
                    <i class="glyphicon glyphicon-arrow-right"></i>
                    @foreach ($citylists as $city )
                        @if ($city->city_id == $flightdetail->fl_city_to_id)
                            {{$city->city_name. " (". $city->city_code . ")" }}
                        @endif
                    @endforeach
                </h2>
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong>{{$flightdetail->airline_name}}</strong></h4>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">From:</label>
                                            <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_departure_date))}}</big></div>
                                            <div><span class="place">
                                                    @foreach ($citylists as $city )
                                                        @if ($city->city_id == $flightdetail->fl_city_from_id)
                                                            {{$city->city_name . " (". $city->city_code . ")" }}
                                                        @endif
                                                    @endforeach
                                                </span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">To:</label>
                                            <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date))}}</big></div>
                                            <div><span class="place">
                                                    @foreach ($citylists as $city )
                                                        @if ($city->city_id == $flightdetail->fl_city_to_id)
                                                            {{$city->city_name. " (". $city->city_code . ")" }}
                                                        @endif
                                                    @endforeach
                                                </span></div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label">Duration:</label>
                                            <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date) - strtotime($flightdetail->fl_departure_date) )}}</big></div>
                                            @foreach ($countStansit as $count)
                                                @if ($count->transit_fl_id == $flightdetail->fl_id)
                                                    <div><strong class="text-danger">{{$count->Num }} Transit</strong></div>
                                                @endif
                                             @endforeach
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <h3 class="price text-danger"><strong>IDR {{$cost}}</strong></h3>
                                            <div>
                                                <a href="{{route('flight-book')}}" class="btn btn-primary">Choose</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#flight-detail-tab">Flight Details</a></li>
                                        <li><a data-toggle="tab" href="#flight-price-tab">Price Details</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="flight-detail-tab" class="tab-pane fade in active">
                                            <ul class="list-group">
                                                @foreach($transits as $transit)
                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">{{$flightdetail->airline_name . " " . $flightdetail->fl_code}}</strong>
                                                        <p><span class="flight-class">
                                                                @foreach($flightclasses as $flightclass)
                                                                    @if ($flightclass->fc_id == Session::get('fc_id'))
                                                                        {{$flightclass->fc_name}}
                                                                    @endif
                                                                @endforeach
                                                            </span></p>
                                                    </h5>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                @foreach ($citylists as $city )
                                                                    @if ($city->city_id == $transit->fl_city_from_id)
                                                                    <div class="col-sm-4">
                                                                        <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_departure_date))}}</big></div>
                                                                        <div><small class="date">{{date("d:m:y", strtotime($flightdetail->fl_departure_date))}}</small></div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                            <div><span class="place">{{$city->city_name. " (". $city->city_code . ")" }}</span></div>
                                                                            <div><small class="airport">{{$city->airport_name}}</small></div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                @foreach ($citylists as $city )
                                                                    @if($city->city_id == $transit->transit_city_id)
                                                                        <div class="col-sm-4">
                                                                            <div><big class="time">{{date("H:i", strtotime($transit->transit_departure_date))}}</big></div>
                                                                            <div><small class="date">{{date("d:m:y", strtotime($transit->transit_departure_date))}}</small></div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div><span class="place">{{$city->city_name. " (". $city->city_code . ")" }}</span></div>
                                                                            <div><small class="airport">{{$city->airport_name}}</small></div>
                                                                        </div>
                                                                    @endif

                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Duration:</label>
                                                            <div><strong class="time">{{date("H:i", strtotime($transit->transit_departure_date) - strtotime($flightdetail->fl_departure_date) )}}</strong></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                    @foreach ($citylists as $city )
                                                        @if($city->city_id == $transit->transit_city_id)
                                                <li class="list-group-item list-group-item-warning">
                                                    <ul>
                                                        <li>Transit for {{date("H:i", strtotime($transit->transit_landing_date) - strtotime($transit->transit_departure_date) ) . ' in '. $city->city_name. " (". $city->city_code . ")" }}</li>
                                                    </ul>
                                                </li>
                                                        @endif

                                                    @endforeach

                                                <li class="list-group-item">
                                                    <h5>
                                                        <strong class="airline">{{$flightdetail->airline_name . " " . $flightdetail->fl_code}}</strong>
                                                        <p><span class="flight-class">
                                                                @foreach($flightclasses as $flightclass)
                                                                    @if ($flightclass->fc_id == Session::get('fc_id'))
                                                                        {{$flightclass->fc_name}}
                                                                    @endif
                                                                @endforeach
                                                            </span></p>
                                                    </h5>
                                                    <div class="row">

                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">{{date("H:i", strtotime($transit->transit_landing_date))}}</big></div>
                                                                    <div><small class="date">{{date("d:m:y", strtotime($transit->transit_landing_date))}}</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    @foreach ($citylists as $city )
                                                                        @if ($city->city_id == $transit->transit_city_id)
                                                                            <div><span class="place">{{$city->city_name. " (". $city->city_code . ")" }}</span></div>
                                                                            <div><small class="airport">{{$city->airport_name}}</small></div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div><big class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date))}}</big></div>
                                                                    <div><small class="date">{{date("d:m:y", strtotime($flightdetail->fl_landing_date))}}</small></div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    @foreach ($citylists as $city )
                                                                        @if ($city->city_id == $flightdetail->fl_city_to_id)
                                                                            <div><span class="place">{{$city->city_name. " (". $city->city_code . ")" }}</span></div>
                                                                            <div><small class="airport">{{$city->airport_name}}</small></div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 text-right">
                                                            <label class="control-label">Duration:</label>
                                                            <div><strong class="time">{{date("H:i", strtotime($flightdetail->fl_landing_date) - strtotime($transit->transit_landing_date) )}}</strong></div>
                                                        </div>
                                                    </div>
                                                </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                        <div id="flight-price-tab" class="tab-pane fade">
                                            <h5>
                                                <strong class="airline">{{$flightdetail->airline_name}}</strong>
                                                <p><span class="flight-class">
                                                        @foreach($flightclasses as $flightclass)
                                                            @if ($flightclass->fc_id == Session::get('fc_id'))
                                                                {{$flightclass->fc_name}}
                                                            @endif
                                                        @endforeach
                                                    </span></p>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <strong>Passengers Fare (x3)</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>IDR {{$cost*3 }}</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="pull-left">
                                                        <span>Tax</span>
                                                    </div>
                                                    <div class="pull-right">
                                                        <span>Included</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li class="list-group-item list-group-item-info">
                                                    <div class="pull-left">
                                                        <strong>You Pay</strong>
                                                    </div>
                                                    <div class="pull-right">
                                                        <strong>IDR {{$cost*3 }}</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            </section>
        </div>
    </main>
@endsection