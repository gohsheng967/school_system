<x-home-master>

@section('content')
<table id="dataTable" class="table table-bordered" style ="width:100%">
        <thead>
            <tr>
                <th>序</th>
                <th>课程 / 培训题目</th>
                <th>主办单位</th>
                <th class ="align-middle text-center">开始日期</th>
                <th class ="align-middle text-center">结束日期</th>
                <th class ="align-middle text-center">天数</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course as $course)
            <tr>
                <td class ="align-middle"></td>
                <td class ="align-middle"><a href="{{route('principal.course_edit',$course->id)}}">{{$course->title}}</a></td>
                <td class ="align-middle">{{$course->organizer}}</td>
                <td class ="align-middle text-center">{{$course->Start_Date}}</td>
                <td class ="align-middle text-center">{{$course->End_Date}}</td>
                <td class ="align-middle text-center">
                    @php 
                        $day = (new DateTime($course->End_Date))->diff(new DateTime($course->Start_Date))->days;
                        echo $day + 1;
                    @endphp
                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
</x-home-master>