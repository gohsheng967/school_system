<x-home-master>
    @section('content')
    <table id="dataTable" class="display table nowrap table-bordered  table-hover" style="width:100%">
        <thead>
            <tr>
                <th>序</th>
                <th>学号 Student ID</th>
                <th>姓名</th>
                <th>Name</th>
                <th>身份证号码</th>
                <th>出身证号码</th>
                <th>父亲名字</th>
                <th>母亲名字</th>
                <th>监护人名字</th>

            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td></td>
                <td class="align-middle">{{$student->id}} <small><a href="{{route('academic.details',$student->id)}}">edit</a></small></td>
                <td class="align-middle">{{$student->name_chi}}</td>
                <td class="align-middle">{{$student->name_eng}}</td>
                <td class="align-middle">{{$student->identity_no}}</td>
                <td class="align-middle">{{$student->birth_no}}</td>
                <td class="align-middle">{{$student->fathername_chi}} {{$student->fathername_eng}}</td>
                <td class="align-middle">{{$student->mothername_chi}} {{$student->mothername_eng}}</td>
                <td class="align-middle">{{$student->guardianname_chi}} {{$student->guardianname_eng}}</td>

            </tr>
            @endforeach
        </tbody>

    </table>

    @endsection
</x-home-master>