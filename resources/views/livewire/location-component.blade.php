<div>
    <div class="col-md-6">
        <ul class="visible-md visible-lg text-right">
            <li><a href="{{route('contact')}}"><i class="fa fa-comment"></i> Contact us </a></li>
            @if (Session::has('city'))
            <li><a href="{{route('change-location')}}"><i class="fa fa-map-marker"></i> {{Session::get('city')}},
                {{Session::get('state')}}</a></li>
            @else
            <li><a href="{{route('change-location')}}"><i class="fa fa-map-marker"></i> Faridabad,
                Haryana</a></li>
            @endif

        </ul>
    </div>
</div>
