@extends('layouts.app')

@section('scripts')
@parent
<script src="http://127.0.0.1:3000/vendors~main.main.js"></script>
<script src="http://127.0.0.1:3000/main.js"></script>
@stop

@section('content')
<div class="container">
    <div id="pomot-app"></div>
</div>
@endsection
