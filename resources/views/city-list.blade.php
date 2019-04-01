@extends('layout.master')
@section('content')
    <main>
        <div class="container">
            <section>
                <h2>
                    Thành phố có sân bay
                </h2>
                    <article>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label class="control-label">STT</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Tên Thành Phố</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Mã Thành Phố</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="control-label">Sân bay</label>
                                            </div>
                                        </div>
                                        @foreach($citylists as $citylist)
                                            @if ($citylist->city_airport_id != null)
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div><big class="time"></big></div>
                                                        <div><span class="place">{{$citylist->city_id}}</span></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div><big class="time"></big></div>
                                                        <div><span class="place">{{$citylist->city_name}}</span></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div><big class="time"></big></div>
                                                        <div><span class="place">{{$citylist->city_code}}</span></div>
                                                    </div>
                                                    @foreach($airports as $airport)
                                                        @if ($citylist->city_airport_id == $airport->airport_id)
                                                        <div class="col-sm-3">
                                                            <div><big class="time"></big></div>
                                                            <div><span class="place">{{$airport->airport_name}}</span></div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
            </section>
        </div>
    </main>
@endsection