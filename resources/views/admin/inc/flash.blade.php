 @if ($flash = session('flash')) 
    <div class="flash">
            <div class="alert alert-{{$flash['status']}}" role="alert">{{$flash['message']}}</div>
    </div>
@endif