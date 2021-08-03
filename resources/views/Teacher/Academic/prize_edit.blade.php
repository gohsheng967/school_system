<x-home-master>
    @section('content')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

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
    <div class="row">
        <h4 class="col-sm-4">查看 / 修改学术比赛</h4>
    </div>
        <a href="{{route('academic.prize')}}" class =" btn btn-secondary btn-sm float-right">得奖总表</a>
    <br>
    <br>
    {!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Academic@prize_save']]) !!}
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="title">比赛标题</label>
                <input type="text" class="form-control" id="title" name ="title" value ="{{$academic->title}}">
            </div>
            <div class="form-group col-sm-5">
                <label for="organizer">主办单位</label>
                <input type="text" class="form-control" id="organizer" name ="organizer" value ="{{$academic->organizer}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="date">日期</label>
                @php
                    $date = date("m/d/Y",strtotime($academic->date));
                @endphp
                <input type="text" class="form-control datepicker" id="date" name ="date" value="{{$date}}">    
            </div>
            <div class="form-group col-sm-3">
                <label for="group">个人 / 组别</label>
                <select name="group" id="group" class="form-control">
                    <option value="{{$academic->group}}">{{$academic->group}}</option>
                    <option disabled>_______</option>
                    <option value="个人 Individual">个人 Individual</option>
                    <option value="组别 Group">组别 Group</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="level">等级</label>
                <select name="level" id="level" class="form-control">
                    <option value="{{$academic->level}}">{{$academic->level}}</option>
                    <option disabled>_______</option>
                    <option value="国际 International">国际 International</option>
                    <option value="全国 National">全国 National</option>
                    <option value="州 State">州 State</option>
                    <option value="区县 District">区县 District</option>
                    <option value="校内 Intramural">校内 Intramural</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
                <input type="text" name ="id" hidden value ="{{$academic->id}}">
                <input type="submit" class =" btn btn-success col-sm-2 ml-auto"value ="储存 Save">
        </div>
        {!! Form::close() !!}


        <div class="row">
            <h5 class ="border border-warning p-3 rounded">得奖名单<span class="badge badge-dark">{{count($academic->students)}}</span></h5>
        </div>
        <br>
            <table id="dataTable" class="table table-bordered" style ="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">学号</th>
                        <th scope="col">姓名</th>
                        <th scope="col" class="text-center">班级</th>
                        <th scope="col" class="text-center">奖项</th>
                        <th scope="col" class="text-center"></th>

                    </tr>
                </thead>
            <tbody>
            @foreach($academic->students as $winner)
            <tr>
                <th scope="row"></th>
                <td>{{$winner->id}}</td>


                <td>{{$winner->name_chi}}   {{$winner->name_eng}}</td>
                <td class ="text-center">
                @php
                    $competition_year = date("Y",strtotime($academic->date));
                    if($winner->classes->where('year',$competition_year)->first() != null){
                        $class_name = $winner->classes->where('year',$competition_year)->first();
                        echo $class_name->class_name;
                    }else{
                        echo "Class Not Found";
                    }
                @endphp
                </td>
                <td class="text-center">{{$winner->pivot->award}}</td>
                <td class="text-center">
                {!! Form::open(['method'=>'delete','action'=>['App\Http\Controllers\Academic@prize_deletewinner']]) !!}

                    <input type="text" value ="{{$winner->pivot->id}}"  hidden name ="pivot_id">
                    <input type="checkbox" required>
                    <input type="submit" value ="Remove" class ="btn btn-danger btn-sm">
                {!! Form::close() !!}
                </td>

            </tr>
            @endforeach
            </tbody>
            </table>
<hr>

            <div class="row my-2">
                <button class = 'btn btn-success col-sm-1 mx-auto btn-sm' data-toggle="modal" data-target="#add_participant"><i class="fas fa-plus"></i></button>
            </div>


{!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Academic@prize_addwinner']]) !!}
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_participant" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">添加得奖名单</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="winner">得奖参赛者</label>
            <select name="winner" id="winner" class ="form-control selectpicker" data-live-search ="True">
                <option value=""></option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->id}} {{$student->name_chi}} {{$student->name_eng}}</option>
                @endforeach
            </select>
            <input type="text" name ="competition_id" value ="{{$academic->id}}" hidden>
        </div>
        <div class="form-group">
            <label for="winner">得奖项目</label>
            <input type="text" name ="award_detail" class ="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" class ='btn btn-sm btn-success' name ="submit" value ="Save"> 
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

    @endsection
</x-home-master>