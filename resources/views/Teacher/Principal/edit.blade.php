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

<h5><span class ="badge badge-dark p-3"><i class="fas fa-user-edit"></i> 教职员档案</span></h5>
<br>


{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@save']]) !!}

<div class="row mx-1">
    <div class="form-group col-sm-3">
        <label for="staff_id">教职员编号</label>
        <input type="number" class="form-control" id="staff_id" name= "staff_id"  value ="{{$staff->id}}" readonly>
    </div>
    <div class="form-group col-sm-3">
        <label for="chi_name">姓名（中）</label>
        <input type="text" class="form-control" id="chi_name"  name= "chi_name" required value ="{{$staff->name_chi}}" >
    </div>
    <div class="form-group col-sm-5">
        <label for="eng_name">姓名（英）</label>
        <input type="text" class="form-control" id="eng_name"  name= "eng_name" required value ="{{$staff->name_eng}}"> 
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-5">
        <label for="identity">身份证/护照</label>
        <input type="text" class="form-control" id="identity"  name= "identity" required value ="{{$staff->identity}}">
        <small>样本 ：<b>001122-33-1234</b></small>
    </div>
    <div class="form-group col-sm-3">
        <label for="personal_contact">联系电话（个人）</label>
        <input type="number" class="form-control" id="personal_contact" name= "personal_contact" required value ="{{$staff->personal_contact}}">
        <small>样本 ： <b>0123456789</b></small>
    </div>
    <div class="form-group col-sm-3">
        <label for="home_contact">联系电话（住家）</label>
        <input type="number" class="form-control" id="home_contact"  name= "home_contact" value ="{{$staff->contact_home}}">
        <small>样本 ： <b>045123456</b></small>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-5">
        <label for="personal_email">电邮地址</label>
        <input type="email" class="form-control" id="personal_email"  name= "personal_email" value ="{{$staff->personal_email}}">
        <small>样本 ：<b>example@gmail.com</b></small>
    </div>
    <div class="form-group col-sm-6 border">
        <label for="ex-student">校友</label>
        <div class="row m-1">
            <div class="form-group form-check mx-2">
                @if($staff->ex_studentPrimary != null)
                <input type="checkbox" class="form-check-input" id="ex_Primary" name = "ex_Primary" checked>
                @else
                <input type="checkbox" class="form-check-input" id="ex_Primary" name = "ex_Primary">
                @endif
                <label class="form-check-label" for="ex_Primary">日新小学校友</label>
            </div>
            <div class="form-group form-check mx-2">
                @if($staff->ex_studentIND != null)
                <input type="checkbox" class="form-check-input" id="ex_Ind" name = "ex_Ind" checked>
                @else
                <input type="checkbox" class="form-check-input" id="ex_Ind" name = "ex_Ind">
                @endif
                <label class="form-check-label" for="ex_Ind">日新独中校友</label>
            </div>
            <div class="form-group form-check mx-2">
                @if($staff->ex_studentSMJK != null)
                <input type="checkbox" class="form-check-input" id="ex_SMJK" name = "ex_SMJK" checked>
                @else
                <input type="checkbox" class="form-check-input" id="ex_SMJK" name = "ex_SMJK">
                @endif
                <label class="form-check-label" for="ex_SMJK">日新国中校友</label>
            </div>
        </div>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <label for="home_address">住家地址</label>
        <input type="text" class="form-control" id="home_address"  name= "home_address" required value ="{{$staff->home_address}}">
    </div>
</div>
<br>
<div class="row">
    <input type="submit" value ="Save" class ="btn btn-success btn-sm mr-auto col-sm-3 ml-4">
</div>
{!! Form::close() !!}

<br>
<br>

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">教育背景 Qualification</th>
                    <th scope="col">Level</th>
                    <th scope="col">Period</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staff->UserEducation as $item)
                <tr>
                {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Principal@ed_delete',$item->id]]) !!}

                    <td class ="align-middle" style="width: 50%"><input type="text" class ="form-control" value = "{{$item->education_background}}" name ="edu" required></td>
                    <td class ="align-middle" style="width: 15%">
                        <select name="edu_level" id="edu_level" class ="form-control" required>
                            <option value="{{$item->level}}">{{$item->level}}</option>
                            <option value="小学">小学</option>
                            <option value="中学">中学</option>
                            <option value="文凭">文凭</option>
                            <option value="学士">学士</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                        </select>
                    </td>
                    <td class ="align-middle" ><input type="text" class ="form-control date2" value ="{{$item->period}}" name ="edu_period" required></td>
                    <td class ="align-middle" ><input type="submit" class ="btn btn-sm btn-danger" name ="Delete" value ="Delete"></td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
                <tr>
                    <td class ="align-middle" colspan ="4"><button class ="text-center btn btn-block btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus block"></i></button></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">课程 / 培训 Course / Training</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Start_Date</th>
                    <th scope="col">End_Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staff->Course as $topic)
                <tr>
                    <td class ="align-middle" style="width: 30%"><input type="text" class ="form-control" value = "{{$topic->title}}" readonly></td>
                    <td class ="align-middle" style="width: 30%"><input type="text" class ="form-control" value = "{{$topic->organizer}}" readonly></td>
                    <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$topic->Start_Date}}" name ="edu_period" readonly></td>
                    <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$topic->End_Date}}" name ="edu_period" readonly></td>
                </tr>
            @endforeach
                <tr>
                    <td class ="align-middle" colspan ="4"><a href = "/" class ="text-center btn btn-block btn-outline-secondary btn-sm"><i class="fas fa-plus block"></i></a></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>







<hr style ="border:1px solid black">

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <div class="row">
        <table class="table table-info">
            <thead>
                <tr>
                    <th scope="col">职位 Position</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staff->UserPosition as $title)
                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\Principal@position_update',$title->id]]) !!}
                <tr>
                    <td class ="align-middle"><input type="text" class ="form-control" value ="{{$title->position}}" name ="position" required readonly></td>
                    @if($title->End_Date == null)
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->Start_Date}}" name ="start_date" required readonly></td>
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->End_Date}}" name ="end_date" required></td>
                        <td class ="align-middle" ><input type="submit" class ="btn btn-sm btn-info" name ="Delete" value ="Update"></td>
                    @else
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->Start_Date}}" name ="start_date" required readonly></td>
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->End_Date}}" name ="end_date" required readonly></td>
                        <td class ="align-middle" ><input type="submit" class ="btn btn-sm btn-info" name ="Delete" value ="Update" disabled></td>
                    @endif
                </tr>
                {!! Form::close() !!}
            @endforeach
                <tr>
                    <td class ="align-middle" colspan ="4"><button class ="text-center btn btn-block btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModalCenter2"><i class="fas fa-plus block"></i></button></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<hr style ="border:1px solid black">




<!-- Modal -->
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@ed_create']]) !!}
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">为 {{$staff->id}} {{$staff->name_chi}} 添加教育背景</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">Qualification</th>
                    <th scope="col">Level</th>
                    <th scope="col">Period</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <input type="text" class ="form-control" name ="staff_id" value ="{{$staff->id}}"required hidden>
                    <td class ="align-middle" style="width: 50%"><input type="text" class ="form-control" name ="edu" required></td>
                    <td class ="align-middle" style="width: 15%">
                        <select name="edu_level" id="edu_level" class ="form-control" required>
                            <option value=""></option>
                            <option value="小学">小学</option>
                            <option value="中学">中学</option>
                            <option value="文凭">文凭</option>
                            <option value="学士">学士</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                        </select>
                    </td>
                    <td class ="align-middle" ><input type="text" class ="form-control date2"  name ="edu_period" required></td>
                    {!! Form::close() !!}
                </tr>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" name ="add_edu" value ="Add" class ="btn btn-success btn-sm">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}




<!-- Modal -->
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@position_create']]) !!}
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">为 {{$staff->id}} {{$staff->name_chi}} 添加职位 Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
            <thead>
                <tr>
                    <th scope="col">职位 Position</th>
                    <th scope="col">Start Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <input type="text" class ="form-control" name ="staff_id" value ="{{$staff->id}}"required hidden>
                    <td class ="align-middle" style="width: 50%">
                        <select name="position" id="position" class ="form-control" required>
                            <option value=""></option>
                            <option value="校长">校长</option>
                            <option value="副校长">副校长</option>
                            <option value="主任">主任</option>
                            <option value="副主任">副主任</option>
                            <option value="行政教师">行政教师</option>
                            <option value="教师">教师</option>
                            <option value="主管">主管</option>
                            <option value="职员">职员</option>
                            <option value="技术人员">技术人员</option>
                            <option value="舍监">舍监</option>
                        </select>
                    </td>
                    <td class ="align-middle" style="width: 15%">
                        <input type="date" class ="form-control"  name ="Start_Date" required>
                    </td>
                </tr>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <input type="submit" name ="add_edu" value ="Add" class ="btn btn-success btn-sm">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection

</x-home-master>