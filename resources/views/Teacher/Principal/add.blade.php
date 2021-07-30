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

<h5><span class ="badge badge-dark p-3"><i class="fas fa-user-plus"></i> 教职员档案</span></h5>
<br>
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Principal@save']]) !!}

<div class="row mx-1">
    <div class="form-group col-sm-3">
        <label for="staff_id">教职员编号</label>
        <input type="number" class="form-control" id="staff_id" name= "staff_id"  required>
        <small>Last Staff ID in database: <b>{{$staff_id->id}}</b></small>
    </div>
    <div class="form-group col-sm-3">
        <label for="chi_name">姓名（中）</label>
        <input type="text" class="form-control" id="chi_name"  name= "chi_name" required>
    </div>
    <div class="form-group col-sm-5">
        <label for="eng_name">姓名（英）</label>
        <input type="text" class="form-control" id="eng_name"  name= "eng_name" required>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-5">
        <label for="identity">身份证/护照</label>
        <input type="text" class="form-control" id="identity"  name= "identity" required>
        <small>样本 ：<b>001122-33-1234</b></small>
    </div>
    <div class="form-group col-sm-3">
        <label for="personal_contact">联系电话（个人）</label>
        <input type="number" class="form-control" id="personal_contact" name= "personal_contact" required>
        <small>样本 ： <b>0123456789</b></small>
    </div>
    <div class="form-group col-sm-3">
        <label for="home_contact">联系电话（住家）</label>
        <input type="number" class="form-control" id="home_contact"  name= "home_contact">
        <small>样本 ： <b>045123456</b></small>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-5">
        <label for="personal_email">电邮地址</label>
        <input type="email" class="form-control" id="personal_email"  name= "personal_email">
        <small>样本 ：<b>example@gmail.com</b></small>
    </div>
    <div class="form-group col-sm-6 border">
        <label for="ex-student">校友</label>
        <div class="row m-1">
            <div class="form-group form-check mx-2">
                <input type="checkbox" class="form-check-input" id="ex_Primary" name = "ex_Primary">
                <label class="form-check-label" for="ex_Primary">日新小学校友</label>
            </div>
            <div class="form-group form-check mx-2">
                <input type="checkbox" class="form-check-input" id="ex_Ind" name = "ex_Ind">
                <label class="form-check-label" for="ex_Ind">日新独中校友</label>
            </div>
            <div class="form-group form-check mx-2">
                <input type="checkbox" class="form-check-input" id="ex_SMJK" name = "ex_SMJK">
                <label class="form-check-label" for="ex_SMJK">日新国中校友</label>
            </div>
        </div>
    </div>
</div>

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <label for="home_address">住家地址</label>
        <input type="text" class="form-control" id="home_address"  name= "home_address" required>
    </div>
</div>

<hr>

<div class="row mx-1">
    <div class="form-group col-sm-11">
        <label for="Education_background"><b>教育背景</b></label>
        <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">序</th>
                <th scope="col">Qualification</th>
                <th scope="col">Level</th>
                <th scope="col">Period</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class ="align-middle">1</th>
                    <td class ="align-middle" style="width: 50%"><input type="text" class ="form-control" placeholder = "University Malaya - Education in Biology" name ="edu1" required></td>
                    <td class ="align-middle" style="width: 15%">
                        <select name="edu_level1" id="edu_level1" class ="form-control" required>
                            <option value=""></option>
                            <option value="小学">小学</option>
                            <option value="中学">中学</option>
                            <option value="文凭">文凭</option>
                            <option value="学士">学士</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                        </select>
                    </td>
                    <td class ="align-middle" ><input type="text" class ="form-control date2" value =" " name ="edu_period1" required></td>
                </tr>
                <tr>
                    <th scope="row" class ="align-middle">2</th>
                    <td class ="align-middle"><input type="text" class ="form-control" placeholder = "University Malaya - Education in Biology" name ="edu2"></td>
                    <td class ="align-middle" style="width: 15%">
                        <select name="edu_level2" id="" class ="form-control"> 
                            <option value=""></option>
                            <option value="小学">小学</option>
                            <option value="中学">中学</option>
                            <option value="文凭">文凭</option>
                            <option value="学士">学士</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                        </select>
                    </td>
                    <td class ="align-middle"><input type="text" class ="form-control date2" name ="edu_period2"></td>
                </tr>
                <tr>
                    <th scope="row" class ="align-middle">3</th>
                    <td class ="align-middle"><input type="text" class ="form-control" placeholder = "University Malaya - Education in Biology" name="edu3"></td>
                    <td class ="align-middle" style="width: 15%">
                        <select name="edu_level3" id="" class ="form-control">
                            <option value=""></option>
                            <option value="小学">小学</option>
                            <option value="中学">中学</option>
                            <option value="文凭">文凭</option>
                            <option value="学士">学士</option>
                            <option value="硕士">硕士</option>
                            <option value="博士">博士</option>
                        </select>
                    </td>
                    <td class ="align-middle"><input type="text" class ="form-control date2" name="edu_period3"></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row mx-1">
    <div class="form-group col-sm-11">
        <label for="Join_Date"><b>入职日期</b></label>
        <div class="row mx-1">
            <select name="position" id="" class ="form-control col-sm-3" required>
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
            <input type="text" name="join_date" class ="form-control col-sm-2 mx-1 date1" required/>
        </div>
    </div>
</div>

<input type="submit" value ="添加 Create" name ="Submit" class ="btn btn-success btn-md float-right">
{!! Form::close() !!}

@endsection

</x-home-master>