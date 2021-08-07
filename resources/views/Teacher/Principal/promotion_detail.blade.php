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

    <div class="card">
        <div class="card-header">
          在学优惠修改
        </div>
        
        <div class="card-body">
        {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\Principal@promotion_edit',$record->id]]) !!}
            <div class="form-group row">
                <label for="promo_title" class="col-sm-2 col-form-label">优惠标题</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="promo_title" value ="{{$record->title}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">类型</label>
                <div class="col-sm-4">
                <select name="category" class ="form-control">
                    <option value ="{{$record->category}}">{{$record->category}}</option>
                    <option value="" disabled>_____</option>
                    <option value="奖学金">奖学金</option>
                    <option value="助学金">助学金</option>
                    <option value="奖励金">奖励金</option>
                    <option value="贷学金">贷学金</option>
                    <option value="贷书">贷书</option>
                    <option value="其他">其他</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="remark" class="col-sm-2 col-form-label">备注</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="remark" value ="{{$record->remark}}">
                </div>
            </div>
            <div class="row">
                <input type="submit" class ='btn btn-success btn-sm col-sm-1 ml-auto mr-3' name ='submit' value ='储存'>
            </div>
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Principal@promotion_delete',$record->id]]) !!}
        <div class="card-footer bg-transparent ">
            <div class="row">
                <input type="submit" class ='btn btn-danger btn-sm col-sm-1 ml-auto mr-3' name ='delete' value ='删除'>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">名单</h5>
            <table class="table table-bordered" id ="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">年份</th>
                        <th scope="col">学号</th>
                        <th scope="col">姓名（中）</th>
                        <th scope="col">Name</th>
                        <th scope="col">Remark</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan = "6">
                            <button class ="col btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="far fa-plus-square"></i>
                            </button></td>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($record->students as $student)
                    <tr>
                        <th scope="row" style="width:2%"></th>
                        <td style="width:8%">{{$student->pivot->year}}</td>
                        <td style="width:10%">{{$student->id}}</td>
                        <td style="width:20%">{{$student->name_chi}}</td>
                        <td style="width:30%">{{$student->name_eng}}</td>
                        <td style="width:30%">{{$student->pivot->remark}} |
                        <a href="#" data-href="{{route('principal.promotion_students_delete',$student->pivot->id)}}" data-toggle="modal" data-target="#confirm-delete" class ="badge badge-danger">Remove This Row</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

{!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Principal@promotion_students']]) !!}
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">添加{{$record->title}}受惠学生</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="student_id">受惠学生学号</label>
            <select class="form-control selectpicker" name='student_id' id ="student_id" data-live-search="True" required>
                <option disabled selected></option>
                @foreach($students as $student)
                    <option value="{{$student->id}}">{{$student->id}}</option>
                @endforeach
            </select>
        </div>
        @php
            $current_year = date('Y');
        @endphp
        <input type="text" value ="{{$record->id}}" name = "promotions_id" hidden>
        <div class="form-group">
            <label for="student_id">受惠学生学号</label>
            <select class="form-control" name='year' id ="year" required>
                <option disabled selected></option>
                <option value ="{{$current_year}}">{{$current_year}}</option>
                <option value ="{{$current_year+1}}">{{$current_year+1}}</option>
                <option value ="{{$current_year+2}}">{{$current_year+2}}</option>
                <option value ="{{$current_year+3}}">{{$current_year+3}}</option>
                <option value ="{{$current_year+4}}">{{$current_year+4}}</option>
                <option value ="{{$current_year+5}}">{{$current_year+5}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="student_id">备注</label>
            <input type="text" class='form-control' name="remark" maxlength = "100">
        </div>
      </div>
      <div class="modal-footer">
          <input type="submit" name="Save" value ="Save">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                确定删除该资料？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-sm btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
    @endsection
</x-home-master>