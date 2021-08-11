<x-home-master>
@section('content')
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
    <table class="table table-bordered" style="width:100%" id ="dataTable">
        <thead class="thead-dark text-center">
            <tr>
                <th>#</th>
                <th scope="col" >年份</th>
                <th scope="col">班级名称</th>
                <th scope="col" >班导师</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tfoot>
            <th scope="col" ><button class ="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#modal_add"><i class="far fa-plus-square"></i></button></th>
        </tfoot>
        <tbody class="text-center">
            @foreach($class as $class)
            <tr>
                <td></td>
                <td>{{$class->year}}</td>
                <td>{{$class->class_name}}</td>
                <td>{{$class->user->id}} {{$class->user->name_chi}}师</td>
                <td><a href="{{route('academic.class_edit',$class->id)}}" class ="btn btn-info btn-sm mx-1">修改</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


@php
    $current_year = date("Y");
@endphp


{!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Academic@class_add']]) !!}

<!-- Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">添加新班级</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="class_name" class="col-sm-3 col-form-label">班级名称</label>
            <div class="col-sm-4">
                <input type="text"  class="form-control" id="class_name" name ="class_name" maxlength ='4' required>
            </div>
        </div>
        <div class="form-group row">
            <label for="class_year" class="col-sm-3 col-form-label">班级年份</label>
            <div class="col-sm-4">
                <select name="class_year" id="class_year" class ="form-control" required>
                    <option value="" selected disabled></option>
                    <option value="{{$current_year-1}}">{{$current_year-1}}</option>
                    <option value="{{$current_year}}">{{$current_year}}</option>
                    <option value="{{$current_year+1}}">{{$current_year+1}}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="user_id" class="col-sm-3 col-form-label">班导师</label>
            <div class="col-sm-8">
                <select name="user_id" id="user_id" class ="form-control selectpicker" data-live-search ="True" required>
                    <option value="" selected disabled></option>
                    @foreach($user as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->id}}  {{$teacher->name_chi}} {{$teacher->name_eng}}</option>
                    @endforeach

                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <input type="submit" class ='btn btn-success btn-sm' name ="submit" value ="Save">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection


</x-home-master>