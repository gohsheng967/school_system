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
        <tfoot>
            <th>
                <button class ="btn btn-outline-success col" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fas fa-plus-square"></i>
                </button>
            </th>
        </tfoot>
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

{!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Academic@prize_add']]) !!}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">添加比赛</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">比赛标题</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="form-group row">
            <label for="organizer" class="col-sm-2 col-form-label">主办单位</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="organizer">
            </div>
        </div>
        <hr>
        <div class='row'>
            <div class="form-group col-sm-6 row">
                <label for="group" class="col-sm-5 col-form-label">个人 / 组别</label>
                <select name="group" class="form-control col-sm-5">
                    <option value="" disabled selected></option>
                    <option value="个人 Individual">个人 Individual</option>
                    <option value="组别 Group">组别 Group</option>
                </select>
            </div>
            <div class="form-group col-sm-6 row">
                <label for="level" class="col-sm-5 col-form-label">级别</label>
                <select name="level" class="form-control col-sm-5">
                    <option value="" disabled selected></option>
                    <option value="国际 International">国际 International</option>
                    <option value="全国 National">全国 National</option>
                    <option value="州 State">州际 State</option>
                    <option value="区县 District">区县 District</option>
                    <option value="校内 Intramural">校内 Intramural</option>
                </select>
            </div>
        </div>
        <div class='row'>
            <div class="form-group col-sm-6 row">
                <label for="group" class="col-sm-5 col-form-label">个人 / 组别</label>
                <input type="text" class="form-control datepicker col-sm-5" id="date" name ="date" value="01/17/2021">    
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <input type="submit" class ="btn btn-success btn-sm" value ='添加'>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
</x-home-master>