
@foreach($clicks as $click)
{{ Carbon\Carbon::parse($click->created_at)->format('d-m-Y H:i') }} :: {{ $click->total }}
@endforeach
