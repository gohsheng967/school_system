<x-home-master>
@section('content')
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@view2']]) !!}

        <div class="form-group">
            <label>教职员编号</label>
            <select name="staff_id" id="staff_id" class ="form-control selectpicker border" data-live-search ="true" required>
                <option value=""></option>
                @foreach($user as $id)
                    <option value="{{$id->id}}">{{$id->id}} {{$id->name_chi}} {{$id->name_eng}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <a href="{{route('principal.menu')}}" class ="btn btn-secondary btn-md col-sm-1 ml-auto ">目录</a>
                <input type ="submit" class="btn btn-success btn-md col-sm-1 mx-1" name ="submit" id ="submit" value ="查询">

            </div>
        </div>
{!! Form::close() !!}



@endsection
</x-home-master>