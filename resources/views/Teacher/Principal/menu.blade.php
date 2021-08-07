<x-home-master>
    
@section('content')
<div class="bg-custom p-4 rounded">
    <div class="row">
        <a href="{{route('principal.view')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">查询教职员</a>
        <a href="{{route('principal.add')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">添加教职员</a>
        <a href="{{route('principal.course_index')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">教职员培训</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{route('principal.promotion')}}" class ="btn btn-primary col-sm-3 p-2 mx-auto">学生在学优惠</a>
    </div>
</div>
    <hr>
    <table id="dataTable1" class="table table-hover " style="width:100%">
        <thead>
            <tr>
                <th>序</th>
                <th style ="width:15%">教职员编号</th>
                <th style ="width:15%">名字（中）</th>
                <th style ="width:30%">名字（英）</th>
                <th style ="width:15%">联系电话</th>
                <th style ="width:40%">电邮地址</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach($staff as $staff1)

            <tr>
                <td class ="align-middle"></td>
                <td class ="align-middle">{{$staff1->id}}</td>
                <td class ="align-middle">{{$staff1->name_chi}}</td>
                <td class ="align-middle">{{$staff1->name_eng}}</td>
                <td class ="align-middle">{{$staff1->personal_contact}}</td>
                <td class ="align-middle">{{$staff1->email}}</td>
                <td class ="align-middle"><a href="{{route('principal.edit',[$staff1->id])}}"><i class="far fa-edit"></i></a></td>

            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
</x-home-master>