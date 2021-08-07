<x-home-master>
@section('content')
<h5>学生学术比赛</h5>
<a href="{{route('academic.menu')}}" class ="btn btn-secondary float-right btn-sm">目录</a>
<br>
<br>

<table id="dataTable" class="table table-bordered" style ="width:100%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">日期</th>
                <th scope="col">比赛标题</th>
                <th scope="col">主办单位</th>
                <th scope="col">个人/组别</th>
                <th scope="col">等级</th>
                <th scope="col" class ="text-center"> 查看 / 修改</th>

            </tr>
        </thead>
    <tbody>
        @foreach($academic as $competition)
        <tr>
            <th scope="row"></th>
            <td>{{$competition->date}}</td>
            <td>{{$competition->title}}</td>
            <td>{{$competition->organizer}}</td>
            <td>{{$competition->group}}</td>
            <td>{{$competition->level}}</td>
            <td class ="text-center"><a href="{{route('academic.prize_edit',$competition->id)}}" class ="btn btn-sm btn-info">View</a></td>

        </tr>
        @endforeach
    </tbody>
    </table>



@endsection
</x-home-master>