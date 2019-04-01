<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In - Worldskills Travel</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/style.css') }}">
    <style>
        #returnHiden {display: none;}
    </style>
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{url('/')}}" class="navbar-brand">Worldskills Travel</a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('flight_infor') }}">Tạo chuyến bay</a></li>
                        <li><a href="{{ route('city_list') }}">Thành phố có sân bay</a></li>
                        <li><a href="{{ route('airline_list') }}">Hãng bay quốc gia</a></li>
                        <li><a href="#">Welcome
                                @if(Session::get('login') == TRUE)
                                    {{ Session::get('name')}}
                                @else
                                    message
                                @endif

                            </a></li>
                        <li><a href="{{url('/')}}">Flights</a></li>
                        <li>
                            @if(Session::get('login') == TRUE)
                                <a href="{{route('log_out')}}">Log Out</a>
                            @else
                                <a href="{{route('log_in')}}">Log In</a>
                            @endif
                        </li>
                        <li>
                            @if(Session::get('login') == TRUE)
                                <a href="{{route('edt-inf')}}">Update Infor</a>
                            @else
                                <a href="{{route('register')}}">Register</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>