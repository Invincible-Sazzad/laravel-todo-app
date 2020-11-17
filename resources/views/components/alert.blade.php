<div>
    @if (session()->has('message'))
        <div class="py-4 px-2 bg-success">
            {{session()->get('message')}}
        </div>
    @elseif(session()->has('error'))
    
        <div class="py-4 px-2 bg-danger">
            {{session()->get('error')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="py-4 px-2 bg-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>