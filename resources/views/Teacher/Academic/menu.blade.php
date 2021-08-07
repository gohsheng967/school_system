<x-home-master>
@section('content')
<div class="bg-custom p-4 rounded">
    <div class="row">
            <a href="{{route('principal.view')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">查询教职员</a>
            <a href="{{route('principal.course_index')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">教职员培训</a>
    </div>
    <hr>
        <div class="row my-1">
                <a href="/" class ="btn btn-primary col-sm-3 p-2 mx-auto">查询学生资料</a>
                <a href="{{route('academic.add')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">添加学生档案</a>
                <a href="{{route('academic.edit')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">修改学生资料</a>
        </div>
        <div class="row my-1">
                <a href="{{route('academic.prize')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">填写获奖记录</a>
                <a href="{{route('principal.promotion')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">学生在学优惠</a>
        </div>
        <div class="row my-1">
                <a href="{{route('academic.juec')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">上传初中统考成绩</a>
                <a href="{{route('academic.suec')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">上传高中统考成绩</a>
        </div>

</div>
@endsection
</x-home-master>