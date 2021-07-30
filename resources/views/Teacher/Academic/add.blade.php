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
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Academic@create']]) !!}

<div class="p-3 bg-custom">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="student_id">学号 Student ID<span class ="text-danger">*</span></label>
            <input type="number" class="form-control" id="student_id" name ="student_id" value="{{ old('student_id')}}" >
        </div>
        <div class="form-group col-sm-3">
            <label for="student_entry_date">入学日期<span class ="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id="entry_date" name ="entry_date" value="{{ old('entry_date')}}">
        </div>
        <div class="form-group col-sm-2">
            <label for="entry_level">入学年级<span class ="text-danger">*</span></label>
            <select name="entry_level" id="entry_level" class ="form-control">
                <option value="{{ old('entry_level')}}">{{ old('entry_level')}}</option>
                <option value="高三">高三</option>
                <option value="高二">高二</option>
                <option value="高一">高一</option>
                <option value="初三">初三</option>
                <option value="初二">初二</option>
                <option value="初一">初一</option>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="student_type">学生类别<span class ="text-danger">*</span></label>
            <select name="student_type" id="student_type" class ="form-control" >
                <option value="{{ old('student_type')}}">{{ old('student_type')}}</option>
                <option value="本地生">本地生</option>
                <option value="外籍生">外籍生</option>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="name_chi">姓名（中）<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="name_chi" name ="name_chi" value="{{ old('name_chi')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="name_eng">Name<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="name_eng" name ="name_eng" value="{{ old('name_eng')}}">
        </div>
        <div class="form-group col-sm-1">
            <label for="sex">性别<span class ="text-danger">*</span></label>
            <select name="sex" id="sex" class ="form-control" >
                <option value="{{ old('sex')}}">{{ old('sex')}}</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>        
        </div>
        <div class="form-group col-sm-2">
            <label for="hair_color">发色<span class ="text-danger">*</span></label>
            <select name="hair_color" id="hair_color" class ="form-control" >
                <option value="{{ old('hair_color')}}">{{ old('hair_color')}}</option>
                <option value="黑色">黑色</option>
                <option value="棕色">棕色</option>
                <option value="微红">微红</option>
                <option value="金铜">金铜</option>
                <option value="白色">白色</option>
            </select>        
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="birth_no">报身纸号码<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="birth_no" name ="birth_no" maxlength = "10" placeholder = "E123456" value="{{ old('birth_no')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="identity_no">身份证号码<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="identity_no" name ="identity_no" placeholder = "001122071234" value="{{ old('identity_no')}}" maxlength ="15">

        </div>
        <div class="form-group col-sm-3">
            <label for="birth_date">出生日期<span class ="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id="student_birth_date" name ="student_birth_date" value="{{ old('student_birth_date')}}">    
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-2">
            <label for="race">种族<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="race" name ="race" maxlength = "4" placeholder="华族" value="{{ old('race')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="religion">宗教<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="religion" name ="religion" placeholder ="佛教" value="{{ old('religion')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="birth_date">国籍<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="country" name ="country" placeholder ="马来西亚" value="{{ old('country')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-5">
            <label for="personal_email">个人电邮</label>
            <input type="email" class="form-control" id="personal_email" name ="personal_email"  placeholder="abc@gmail.com" value="{{ old('personal_email')}}">
        </div>
        <div class="form-group col-sm-3">
            <label for="personal_phone">个人电话</label>
            <input type="number" class="form-control" id="personal_phone" name ="personal_phone"  placeholder="60123456789"  value="{{ old('personal_phone')}}">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-10">
            <label for="home_address">住家地址<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="home_address" name ="home_address"  placeholder="Lot 1703, Jalan Chee Bee Noor, 14000 Bukit Mertajam" value="{{ old('home_address')}}">
        </div>
    </div>
<hr>
    <div class="row">
        <div class="form-group col-sm-5">
            <label for="primary_school">毕业小学<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="primary_school" name ="primary_school"  placeholder="日新小学（A）校" value="{{ old('primary_school')}}">
        </div>
        <div class="form-group col-sm-3">
            <label for="graduate_year">毕业年份<span class ="text-danger">*</span></label>
            <input type="text" class="form-control datepicker" id="graduate_year" name ="graduate_year" value="{{ old('graduate_year')}}" >
        </div>
        <div class="form-group col-sm-2">
            <label for="primary_grade">小学操行<span class ="text-danger">*</span></label>
            <input type="text" class="form-control" id="primary_grade" name ="primary_grade"  placeholder="A"  value="{{ old('primary_grade')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-5">
            <label for="secondary_school">之前所就读的中学</label>
            <input type="text" class="form-control" id="secondary_school" name ="secondary_school"  placeholder="SEKOLAH MENENGAH XXX" value="{{ old('secondary_school')}}">
        </div>
        <div class="form-group col-sm-3">
            <label for="change_year">转学年份</label>
            <input type="text" class="form-control datepicker" id="change_year" name ="change_year" value="{{ old('change_year')}}">
        </div>
        <div class="form-group col-sm-2">
            <label for="secondary_grade">中学操行</label>
            <input type="text" class="form-control" id="secondary_grade" name ="secondary_grade"  placeholder="A" value="{{ old('secondary_grade')}}">
        </div>
    </div>
    </div>  
    <hr>
    <div class="bg-custom2 p-3">
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="main_contact">主要联系人<span class ="text-danger">*</span></label>
            <select name="main_contact" id="main_contact" class="form-control">
                <option value="{{old('main_contact')}}">{{old('main_contact')}}</option>
                <option value="父亲">父亲</option>
                <option value="母亲">母亲</option>
                <option value="监护人">监护人</option>
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <h5 class ="col-sm-6">父亲资料</h5>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="father_chiname">姓名（中）</label>
            <input type="text" class="form-control" id="father_chiname" name ="father_chiname" value="{{ old('father_chiname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="father_engname">Name</label>
            <input type="text" class="form-control" id="father_engname" name ="father_engname" value="{{ old('father_engname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="father_identity">身份证号码</label>
            <input type="text" class="form-control" id="father_identity" name ="father_identity" placeholder ="661122071234" value="{{ old('father_identity')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="father_contact">联系电话</label>
            <input type="number" class="form-control" id="father_contact" name ="father_contact" placeholder ="60123456789" value="{{ old('father_contact')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="father_email">电邮地址</label>
            <input type="email" class="form-control" id="father_email" name ="father_email" value="{{ old('father_email')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="father_edulevel">教育程度</label>
            <select name="father_edulevel" id="father_edulevel" class ="form-control" >
                <option value="{{ old('father_edulevel')}}">{{ old('father_edulevel')}}</option>
                <option value="小学">小学</option>
                <option value="初中">初中</option>
                <option value="高中">高中</option>
                <option value="文凭">文凭</option>
                <option value="学士">学士</option>
                <option value="硕士">硕士</option>
                <option value="博士">博士</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="father_occupation">职业</label>
            <input type="text" class="form-control" id="father_occupation" name ="father_occupation" value="{{ old('father_occupation')}}">
        </div>
    </div>

    <hr>
<!-- Mother -->
    <div class="row">
        <h5 class ="col-sm-6">母亲资料</h5>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="mother_chiname">姓名（中）</label>
            <input type="text" class="form-control" id="mother_chiname" name ="mother_chiname" value="{{ old('mother_chiname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="mother_engname">Name</label>
            <input type="text" class="form-control" id="mother_engname" name ="mother_engname" value="{{ old('mother_engname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="mother_identity">身份证号码</label>
            <input type="text" class="form-control" id="mother_identity" name ="mother_identity" placeholder ="661122071234" value="{{ old('mother_identity')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="mother_contact">联系电话</label>
            <input type="number" class="form-control" id="mother_contact" name ="mother_contact" placeholder ="60123456789" value="{{ old('mother_contact')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="mother_email">电邮地址</label>
            <input type="email" class="form-control" id="mother_email" name ="mother_email" value="{{ old('mother_email')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="mother_edulevel">教育程度</label>
            <select name="mother_edulevel" id="mother_edulevel" class ="form-control">
                <option value="{{ old('mother_edulevel')}}">{{ old('mother_edulevel')}}</option>
                <option value="小学">小学</option>
                <option value="初中">初中</option>
                <option value="高中">高中</option>
                <option value="文凭">文凭</option>
                <option value="学士">学士</option>
                <option value="硕士">硕士</option>
                <option value="博士">博士</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="mother_occupation">职业</label>
            <input type="text" class="form-control" id="mother_occupation" name ="mother_occupation" value="{{ old('mother_occupation')}}">
        </div>
    </div>
    
    <hr>

    <!-- Guardian -->
    <div class="row">
        <h5 class ="col-sm-6">监护人资料</h5>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="guardian_chiname">姓名（中）</label>
            <input type="text" class="form-control" id="guardian_chiname" name ="guardian_chiname" value="{{ old('guardian_chiname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="guardian_engname">Name</label>
            <input type="text" class="form-control" id="guardian_engname" name ="guardian_engname" value="{{ old('guardian_engname')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="guardian_identity">身份证号码</label>
            <input type="text" class="form-control" id="guardian_identity" name ="guardian_identity" placeholder ="661122071234" value="{{ old('guardian_identity')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="guardian_contact">联系电话</label>
            <input type="number" class="form-control" id="guardian_contact" name ="guardian_contact" placeholder ="60123456789" value="{{ old('guardian_contact')}}">
        </div>
        <div class="form-group col-sm-4">
            <label for="guardian_email">电邮地址</label>
            <input type="email" class="form-control" id="guardian_email" name ="guardian_email" value="{{ old('guardian_email')}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label for="guardian_edulevel">教育程度</label>
            <select name="guardian_edulevel" id="guardian_edulevel" class ="form-control">
                <option value="{{ old('guardian_edulevel')}}">{{ old('guardian_edulevel')}}</option>
                <option value="小学">小学</option>
                <option value="初中">初中</option>
                <option value="高中">高中</option>
                <option value="文凭">文凭</option>
                <option value="学士">学士</option>
                <option value="硕士">硕士</option>
                <option value="博士">博士</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="guardian_occupation">职业</label>
            <input type="text" class="form-control" id="guardian_occupation" name ="guardian_occupation" value="{{ old('guardian_occupation')}}">
        </div>
    </div>
    </div>
    <hr>
    <div class="bg-custom p-3">
        <div class="row">
            <h5 class ="col-sm-6">小学成绩</h5>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">国文理解</th>
                        <th scope="col">国文作文</th>
                        <th scope="col">英文理解</th>
                        <th scope="col">英文作文</th>
                        <th scope="col">华文理解</th>
                        <th scope="col">华文作文</th>
                        <th scope="col">数学</th>
                        <th scope="col">科学</th>
                        <th scope="col">总平均</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class ="form-control" name="primary_malay_comprehensive" maxlength ="3" value="{{ old('primary_malay_comprehensive')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_malay_essay" maxlength ="3" value="{{ old('primary_malay_essay')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_english_comprehensive" maxlength ="3" value="{{ old('primary_english_comprehensive')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_english_essay" maxlength ="3" value="{{ old('primary_english_essay')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_chinese_comprehensive" maxlength ="3" value="{{ old('primary_chinese_comprehensive')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_chinese_essay" maxlength ="3" value="{{ old('primary_chinese_essay')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_math" maxlength ="3" value="{{ old('primary_math')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_sains" maxlength ="3" value="{{ old('primary_sains')}}"></td>
                        <td><input type="text" class ="form-control" name="primary_mark" maxlength ="5" value="{{ old('primary_mark')}}"></td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class =" row my-2">
        <input type="submit" class ='btn btn-success col-sm-2  ml-auto' name ="submit" value = "添加">
    </div>
    {!! Form::close() !!}

@endsection
</x-home-master>