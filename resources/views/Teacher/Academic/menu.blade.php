<x-home-master>
@section('content')
    <div class="row">
            <a href="{{route('principal.view')}}" class ="btn btn-primary col-sm-3 p-2 mx-1">查询教职员</a>
            <a href="{{route('principal.course_index')}}" class ="btn btn-primary col-sm-3 p-2 mx-1">教职员培训</a>
    </div>
    <hr>
    <div class="row my-1">
            <a href="/" class ="btn btn-primary col-sm-3 p-2 m-1">查询学生资料</a>
            <a href="{{route('academic.add')}}" class ="btn btn-primary col-sm-3 p-2 m-1">添加学生档案</a>
            <a href="{{route('academic.edit')}}" class ="btn btn-primary col-sm-3 p-2 m-1">修改学生资料</a>
            <a href="{{route('academic.prize')}}" class ="btn btn-primary col-sm-3 p-2 m-1">填写获奖记录</a>
            <a href="{{route('academic.juec')}}" class ="btn btn-primary col-sm-3 p-2 m-1">上传初中统考成绩</a>
            <a href="{{route('academic.suec')}}" class ="btn btn-primary col-sm-3 p-2 m-1">上传高中统考成绩</a>

    </div>
@endsection
</x-home-master>