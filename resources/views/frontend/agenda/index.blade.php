@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/agenda/jquery.flipster.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/agenda/style.css') }}">
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('js/global/countdown.js') }}"></script>
	<script src="{{ asset('js/frontend/agenda/modernizr.custom.63321.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/agenda/script.js') }}"></script>
@endsection
@extends('experimenteerbuurt-layout')
@section('content')
    <img class="agenda-background" src="{{ asset('/images/agenda/agenda-background.jpg') }}" style="opacity: 0.8; height: 100%; width: 100%; position: absolute; top: 0; left: 0;">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs col-lg-offset-0 animated fadeInRightBig" style="height: 100vh; z-index: 0;">
        <img src="images/analoog-agenda.png" alt="erlenmeyer-background" style="position: absolute; top: 0; left: 0; height: 100vh; width: 100%; z-index: 10;">
    </div>
    @if(count($events) >= 1)
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="background: transparent; height: 100vh;">
            <!-- overview of events in the list -->
            <!-- <div class="col-lg-12 fancy-list" style="height: 20%; background: blue; position: absolute; right: 0; top: 0; margin: 0; padding: 0;">
                <select id="cd-dropdown" name="cd-dropdown" class="cd-select" style="width: 100% !important; margin: 0;">
                    @foreach($events as $event)
                        @if($event->id === $closestEventId)
                        <option value="-1" selected>{{ $event->name }}</option>
                        @endif
                        <option value="1" class="icon-monkey">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div> -->
            @foreach($events as $event)
            @if($event == $events->first())
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event-wrapper" style="border-left: solid 2px #e6332a;">
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event-wrapper hidden">
            @endif
                <div class="row info-container">
                    <div class="event-shadow "></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 agenda-nav-wrapper" style="height: 10%; position: absolute; bottom: 0%; z-index: 3000 !important; color: white; font-size: 1em; display: flex; align-items: center;">
                        <div class="row" style="width: 100vw; height: 100%;">
                            <div class="arrows col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display: flex; align-items: center; height: 100%;">
                                <span class="previous-event glyphicon glyphicon-chevron-left" style="width: 100%; text-align: right;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 event-date invisible">{{ $event->getDateString(1, 2) }}</div>
                            <div class="arrows col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display: flex; align-items: center; height: 100%;">
                                <span class="next-event glyphicon glyphicon-chevron-right" style="width: 100%; text-align: left;"></span>
                            </div>
                        </div>
                    </div>
                    <img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event-background" src="/uploads/events/{{ $event->background_image }}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 initial-info-block">
                        <div style="width: 100%;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 initial-event-name">
                                <span style="width: 100%; text-align: center;">{{ $event->name }}</span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 initial-event-date">
                                <span style="text-transform:capitalize;">{{ $event->getDateString(0, 1, 2) }}</span>
                            </div>
                            <div class="col-lg-2 col-lg-offset-5 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 more-info" data-mode='meer info'>
                                <span style="width: 100%; text-align: center;">Meer info</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 info-block hidden">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 misc-container">
                            <div class="row" style="height: 100%;">
                                @if($event->eventbrite_url)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 eventbrite">
                                    <a href="{{ $event->eventbrite_url }}" target="_blank">
                                        <span class="glyphicon glyphicon-link"></span> Aanmelden
                                    </a>
                                </div>
                                @endif
                                @if($event->cost)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 kosten">
                                    @if($event->gift)
                                    <span class="glyphicon glyphicon-gift"> <span class="kosten-text">Vrije Gift</span>
                                    @elseif($event->cost == 0)
                                    <span class="kosten-text">Gratis</span>
                                    @else
                                    <span class="kosten-text">{{ $event->cost }} &#8364</span>
                                    @endif
                                </div>
                                @endif
                                @if(!$event->eventbrite_url && !$event->cost)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 countdown">
                                @elseif(!$event->eventbrite_url || !$event->cost)
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 countdown">
                                @else
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 countdown">
                                @endif
                                    <span class="timer" data-date="{{ $event->event_date }}"></span>
                                </div>
                            </div>
                        </div>

                        <div class="name-desc-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event-name">
                                    <span>{{ $event->name }}</span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event-description">
                                <hr>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex; align-items: center; justify-content: space-around;">
                                    {{ $event->description }}
                                </div>
                            </div>
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 more-info" data-mode="minder info">
                                <span style="width: 100%; text-align: center;">Terug</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
</div>
<script type="text/javascript" src="{{ URL::asset('js/frontend/agenda/jquery.dropdown.js') }}"></script>
@endsection
