<x-home-master>
@section('content')
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@view2']]) !!}

        <div class="form-group">
            <label>教职员编号</label>
            <select name="staff_id" id="staff_id" class ="form-control selectpicker border" data-live-search ="true" required>
                <option value="{{$staff->id}}">{{$staff->id}} {{$staff->name_chi}} {{$staff->name_eng}}</option>
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

<hr>
<div class="card">
  <div class="card-header">
    教职员资料 {{$staff->id}}
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col-sm-10">
            <div class="row">
                <div class="form-group col-sm-3">
                    <label for="staff_id">教职员编号</label>
                    <input type="number" class="form-control" id="staff_id" name= "staff_id"  value ="{{$staff->id}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="chi_name">姓名（中）</label>
                    <input type="text" class="form-control" id="chi_name"  name= "chi_name"  value ="{{$staff->name_chi}}" readonly >
                </div>
                <div class="form-group col-sm-5">
                    <label for="eng_name">姓名（英）</label>
                    <input type="text" class="form-control" id="eng_name"  name= "eng_name"  value ="{{$staff->name_eng}}" readonly> 
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-5">
                    <label for="identity">身份证/护照</label>
                    <input type="text" class="form-control" id="identity"  name= "identity"  value ="{{$staff->identity}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="personal_contact">联系电话（个人）</label>
                    <input type="number" class="form-control" id="personal_contact" name= "personal_contact"  value ="{{$staff->personal_contact}}" readonly>
                </div>
                <div class="form-group col-sm-3">
                    <label for="home_contact">联系电话（住家）</label>
                    <input type="number" class="form-control" id="home_contact"  name= "home_contact" value ="{{$staff->contact_home}}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-5">
                    <label for="personal_email">电邮地址</label>
                    <input type="email" class="form-control" id="personal_email"  name= "personal_email" value ="{{$staff->personal_email}}" readonly>
                    <small>样本 ：<b>example@gmail.com</b></small>
                </div>
                <div class="form-group col-sm-6 border">
                    <label for="ex-student">校友</label>
                    <div class="row m-1">
                        <div class="form-group form-check mx-2">
                            @if($staff->ex_studentPrimary != null)
                            <input type="checkbox" class="form-check-input" id="ex_Primary" name = "ex_Primary" checked disabled>
                            @else
                            <input type="checkbox" class="form-check-input" id="ex_Primary" name = "ex_Primary" disabled>
                            @endif
                            <label class="form-check-label" for="ex_Primary">日新小学校友</label>
                        </div>
                        <div class="form-group form-check mx-2">
                            @if($staff->ex_studentIND != null)
                            <input type="checkbox" class="form-check-input" id="ex_Ind" name = "ex_Ind" checked disabled>
                            @else
                            <input type="checkbox" class="form-check-input" id="ex_Ind" name = "ex_Ind" disabled>
                            @endif
                            <label class="form-check-label" for="ex_Ind">日新独中校友</label>
                        </div>
                        <div class="form-group form-check mx-2">
                            @if($staff->ex_studentSMJK != null)
                            <input type="checkbox" class="form-check-input" id="ex_SMJK" name = "ex_SMJK" checked disabled>
                            @else
                            <input type="checkbox" class="form-check-input" id="ex_SMJK" name = "ex_SMJK" disabled>
                            @endif
                            <label class="form-check-label" for="ex_SMJK">日新国中校友</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-11">
                    <label for="home_address">住家地址</label>
                    <input type="text" class="form-control" id="home_address"  name= "home_address" value ="{{$staff->home_address}}" readonly>
                </div>
            </div>
        </div>
        <div class="ml-auto col-sm-2">
            <img src="/{{$staff->portrait}}" alt="{{$staff->id}}" width ="100%">
        </div>

                <table class="table col-sm-12">
                    <thead>
                        <tr>
                            <th scope="col">教育背景 Qualification</th>
                            <th scope="col">Level</th>
                            <th scope="col">Period</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff->UserEducation as $item)
                        <tr>
                            <td class ="align-middle" ><input type="text" class ="form-control" value = "{{$item->education_background}}" name ="edu" readonly></td>
                            <td class ="align-middle" style="width: 15%">
                            <select name="edu_level" id="edu_level" class ="form-control" readonly>
                                <option value="{{$item->level}}">{{$item->level}}</option>
                            </select>
                            </td>
                            <td class ="align-middle" ><input type="text" class ="form-control date2" value ="{{$item->period}}" name ="edu_period" readonly></td>
     
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <table class="table table-info">
            <thead>
                <tr>
                    <th scope="col">职位 Position</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($staff->UserPosition as $title)
                <tr>
                    <td class ="align-middle"><input type="text" class ="form-control" value ="{{$title->position}}" name ="position" readonly></td>
                    @if($title->End_Date == null)
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->Start_Date}}" name ="start_date" readonly></td>
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->End_Date}}" name ="end_date" readonly></td>
                    @else
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->Start_Date}}" name ="start_date" readonly></td>
                        <td class ="align-middle" ><input type="date" class ="form-control" value ="{{$title->End_Date}}" name ="end_date" readonly></td>
                    @endif
                </tr>
            @endforeach

            </tbody>
            </table>

</div>

@endsection

</x-home-master>