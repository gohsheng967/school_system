<x-home-master>

@section('content')
<a href="{{route('principal.menu')}}" class ="btn btn-info btn-sm float-right">目录</a>

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
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">课程/培训 题目</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name ="title" id="title" value="{{$course->title}}">
    </div>
</div>
<div class="form-group row">
    <label for="organizer" class="col-sm-2 col-form-label">主办单位</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="organizer" name ="organizer" value="{{$course->organizer}}">
    </div>
</div>
<div class="form-group row">
    <label for="organizer" class="col-sm-2 col-form-label">日期</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="Start_Date" name ="Start_Date" value="{{$course->Start_Date}}">
    </div>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="End_Date" name ="End_Date" value="{{$course->End_Date}}">
    </div>
</div>

  <hr>
    <h5 class ="mx-3"><u>参与者 Participant</u></h5>
    <br>
        <table id="dataTable" class="table table-bordered" style ="width:100%">
            <thead>
                <tr>
                    <th>序</th>
                    <th>教职员编号</th>
                    <th>教职员名字</th>
                    <th>登记日期</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan ="4" class ="text-center">
                        <button class ="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"> </i> 添加参与者</button> 
                        <button class ="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter2"><i class="fas fa-plus"> </i> 移除参与者</button>
                    </td>
                </tr>

            </tfoot>
            <tbody>
                @foreach($course_user as $participant)
                <tr>
                    <td></td>
                    <td class ="align-middle"><a href="{{route('principal.edit',$participant->user_id)}}">{{$participant->user_id}}</a></td>
                    <td class ="align-middle">{{$participant->user['name_chi']}}  {{$participant->user['name_eng']}}</td>
                    <td class ="align-middle">{{$participant->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@course_attend']]) !!}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">添加参与者</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label for="Staff_id" class="col-sm-2 col-form-label">教职员编号</label>
            <input type="text" value ="{{$course->id}}" hidden name="course_id">
            <div class="form-group row">
                <div class="col-sm-12">
                    <select name="user_id[]" id="user_id" class ="form-control selectpicker" multiple data-live-search = 'true'>
                        <option value=""></option>
                        @foreach($unregistered_user as $option)
                            <option value="{{$option}}">{{$option}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" class ='btn btn-sm btn-success' name ="Add" value ="添加">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}



{!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Principal@course_attend_del']]) !!}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">删除参与者</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label for="Staff_id" class="col-sm-2 col-form-label">教职员编号</label>
            <input type="text" value ="{{$course->id}}" hidden name="course_id2">
            <div class="form-group row">
                <div class="col-sm-12">
                    <select name="user_id2[]" id="user_id2" class ="form-control selectpicker" multiple data-live-search = 'true'>
                        <option value=""></option>
                        @foreach($course_user as $option)
                            <option value="{{$option->user_id}}">{{$option->user_id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" class ='btn btn-sm btn-danger' name ="delete" value ="删除">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
</x-home-master>