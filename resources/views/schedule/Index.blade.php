{{-- @extends('layouts.app')

@section('content') --}}
    <table style="width: 100%" border="1">
        <tr>
            <th rowspan="2">Class</th>
            <th colspan="8">Monday</th>
            <th colspan="8">Tuesday</th>
            <th colspan="8">Wednesday</th>
            <th colspan="8">Thursday</th>
            <th colspan="8">Friday</th>
            <th colspan="8">Saturday</th>
        </tr>
        <tr>
            @for ($i = 0; $i < 6 ; $i++)
                @foreach ($study_times as $study_time)
                    <th>{{$study_time->code}}</th>
                @endforeach
            @endfor
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->classRoom->name}}</td>
                {{-- @foreach ($item->teachings as $teaching1) --}}
                    @foreach ($days as $day)
                        @foreach ($study_times as $study_time)
                            @foreach ($study_time->teachings as $teaching)
                                {{-- @if($teaching->day === $day['day']) --}}
                                    {{-- @if($teaching->study_class_id === $item->id) --}}
                                        {{-- @if($i + $i) --}}
                                            @if ($teaching->study_time_id === $study_time->id)
                                                @if ($teaching->study_class_id === $item->id && $teaching->day === $day['day'])
                                                    <td>{{$teaching->subject->short_name}}{{$teaching->teacher->id}}</td>
                                                @elseif ($teaching->day === $day['day'])
                                                    {{-- @if ($teaching->study_class_id === $item->id) --}}
                                                        <td>hi</td>
                                                    {{-- @endif --}}
                                                @endif
                                            @endif
                                            {{-- <td>hi</td> --}}
                                        {{-- @endif --}}
                                    {{-- @endif                                     --}}
                                {{-- @endif --}}
                            @endforeach
                        @endforeach
                    @endforeach
                {{-- @endforeach --}}
            </tr>
        @endforeach
    </table>
{{-- @endsection --}}
