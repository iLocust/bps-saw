@if ($errors->isNotEmpty())
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-title">
            Error!
        </div>
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-title">
            Success!
        </div>
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        @if (is_array(session()->get('success')))
            <ul class="list-unstyled">
                @foreach (session()->get('success') as $success)
                    <li>{{$success}}</li>
                @endforeach
            </ul>
        @else
            {{session()->get('success')}}
        @endif
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible show fade">
        <div class="alert-title">
            Warning!
        </div>
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        @if (is_array(session()->get('warning')))
            <ul class="list-unstyled">
                @foreach (session()->get('warning') as $warning)
                    <li>{{$warning}}</li>
                @endforeach
            </ul>
        @else
            {{session()->get('warning')}}
        @endif
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info alert-dismissible show fade">
        <div class="alert-title">
            Warning!
        </div>
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        @if (is_array(session()->get('info')))
            <ul class="list-unstyled">
                @foreach (session()->get('info') as $info)
                    <li>{{$info}}</li>
                @endforeach
            </ul>
        @else
            {{session()->get('info')}}
        @endif
    </div>
@endif
