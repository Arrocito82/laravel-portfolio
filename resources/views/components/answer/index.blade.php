@foreach ($answers as $answer) 
    <x-answer.show :comment="$answer"/>
    {{-- <div>
        {{$answer}}
    </div> --}}
@endforeach