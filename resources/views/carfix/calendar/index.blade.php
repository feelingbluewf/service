@extends('layouts.app')

@section('content')

<link href='{{ asset('js/fullcalendar/main.min.css') }}' rel='stylesheet' />
<script src='{{ asset('js/fullcalendar/main.min.js') }}'></script>
<script src='{{ asset('js/fullcalendar/config.js') }}'></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">      
                <div class="card-body">
                    <div id="calendar"></div>   
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    var events = <?php echo $events ?>;
    var today = "<?php echo Carbon\Carbon::now()?>";
</script>

@endsection
