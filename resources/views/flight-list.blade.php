@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
                <h2>
                    @foreach ($citylists as $city )
                        @if ($city->city_id == $_GET['from'])
                            {{$city->city_name . " (". $city->city_code . ")" }}
                        @endif
                    @endforeach
                    <i class="glyphicon glyphicon-arrow-right"></i>
                        @foreach ($citylists as $city )
                            @if ($city->city_id == $_GET['to'])
                                {{$city->city_name. " (". $city->city_code . ")" }}
                            @endif
                        @endforeach
                </h2>
                {{--@foreach ($flightlists as $flightlist)--}}
                <article>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><strong><a href="{{ route('flight-detail', ['fl_id'=>$flightlist->fl_id]) }}">{{$flightlist->airline_name}}</a></strong></h4>
                                    <div class="row">
                                            <div class="col-sm-3">
                                                @foreach($citylists as $citylist)
                                                @if($citylist->city_id == $flightlist->fl_city_from_id)
                                                    <label class="control-label">From:</label>
                                                    <div><big class="time">{{date("H:i", strtotime($flightlist->fl_departure_date)) }}</big></div>
                                                    <div><span class="place">{{$citylist->city_name}}</span></div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <div class="col-sm-3">
                                                @foreach($citylists as $citylist)
                                                @if($citylist->city_id == $flightlist->fl_city_to_id)
                                                    <label class="control-label">To:</label>
                                                    <div><big class="time">{{date("H:i", strtotime($flightlist->fl_landing_date))}}</big></div>
                                                    <div><span class="place">{{$citylist->city_name}}</span></div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Duration:</label>
                                                <div><big class="time">{{ date("H:i", strtotime($flightlist->fl_landing_date) - strtotime($flightlist->fl_departure_date) ) }}</big></div>
                                                @foreach ($countStansit as $count)
                                                    @if ($count->transit_fl_id == $flightlist->fl_id)
                                                        <div><strong class="text-danger">{{$count->Num }} Transit</strong></div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <h3 class="price text-danger"><strong>IDR {{$cost}}</strong></h3>

                                                <div>
                                                    <a href="{{ route('flight-detail', ['fl_id'=>$flightlist->fl_id]) }}" class="btn btn-link">See Detail</a>
                                                    <a href="{{ route('flight-book') }}" id="checkReturn" class="btn btn-primary">Choose</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                {{--@endforeach--}}
            </section>
        </div>
    </main>
@endsection