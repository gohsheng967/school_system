<x-home-master>
@section('content')
    @php
        $current = date('Y');
    @endphp
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message')}}
        </div>
    @elseif(Session::has('message_error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message_error')}}

        </div> 
    @endif
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Dont edit this if you trying to create the new class for next year...Please create the new one directly</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! Form::open(['method'=>'patch','action'=>['App\Http\Controllers\Academic@class_save',$class->id]]) !!}
    <div class="form-group row">
        <label for="class_year" class="col-sm-2 col-form-label">年份</label>
        <div class="col-sm-2">
            <select name="class_year" id="class_year" class ='form-control' required>
                <option value="{{$class->year}}">{{$class->year}}</option>
                <option value="" disabled>_</option>
                <option value="{{$current-1}}">{{$current-1}}</option>
                <option value="{{$current}}">{{$current}}</option>
                <option value="{{$current+1}}">{{$current+1}}</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="class_name" class="col-sm-2 col-form-label">班级名字</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" name="class_name" value ="{{$class->class_name}}" maxlength = '4' required>
        </div>
    </div>
    <div class="form-group row">
        <label for="class_teacher" class="col-sm-2 col-form-label">班导师</label>
        <div class="col-sm-4">
            <select name="class_teacher" id="class_teacher" class ='form-control'>
                <option value="{{$class->user->id}}">{{$class->user->id}} {{$class->user->name_chi}}</option>
                <option value="" disabled>_</option>
                @foreach($form_teacher as $user)
                <option value="{{$user->id}}">{{$user->id}} {{$user->name_chi}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row p-1">
        <div class="form-group row ml-auto">
            <input type="submit" class ='btn btn-success btn-md mx-1' value ='储存'>
            <a href="{{route('academic.class_summary')}}" class= 'btn btn-secondary mx-1'>回到班级总表</a>
        </div>
    </div>
    {!! Form::close() !!}
<hr>
<br>
{!! Form::open(['method'=>'delete','action'=>['App\Http\Controllers\Academic@class_del',$class->id]]) !!}
<div class='text-center bg-danger p-3 rounded text-light'>
    <p>删除此班级资料将有可能导致出席记录、成绩资料、学生班级资料遗失</p>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" required>
        <label class="custom-control-label" for="customCheck1">我了解删除此班级的风险</label>
    </div>
    <input type="submit" class = 'my-1 btn btn-light btn-sm' value ="删除" name ='delete'>
</div>
{!! Form::close() !!}

@endsection
</x-home-master>