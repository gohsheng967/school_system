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
        <div class="row  my-0">
            <div class="form-group col-sm-3">
                <label for="student_id">学号 Student ID<span class ="text-danger">*</span></label>
                <input type="number" class="form-control" id="student_id" name ="student_id" value="{{$student->id}}" readonly>
            </div>
            <div class="form-group col-sm-3">
                @php
                    $entry_date = date("m/d/Y",strtotime($student->entry_date));
                @endphp
                <label for="student_entry_date">入学日期<span class ="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" id="entry_date" name ="entry_date" value ="{{$entry_date}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="entry_level">入学年级<span class ="text-danger">*</span></label>
                <select name="entry_level" id="entry_level" class ="form-control">
                <optgroup>
                    <option value="{{$student->entry_level}}">{{$student->entry_level}}</option>
                </optgroup>
                <optgroup label="________">
                    <option value="高三">高三</option>
                    <option value="高二">高二</option>
                    <option value="高一">高一</option>
                    <option value="初三">初三</option>
                    <option value="初二">初二</option>
                    <option value="初一">初一</option>
                </optgroup>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="student_type">学生类别<span class ="text-danger">*</span></label>
                <select name="student_type" id="student_type" class ="form-control" >
                    <optgroup>
                        <option value="{{$student->student_type}}">{{$student->student_type}}</option>
                    </optgroup>
                    <optgroup label="________">
                        <option value="本地生">本地生</option>
                        <option value="外籍生">外籍生</option>
                    </optgroup>
                </select>
            </div>
        </div>
        
        <div class="row my-0">
            <div class="form-group col-sm-3">
                <label for="name_chi">姓名（中）<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="name_chi" name ="name_chi" value="{{$student->name_chi}}">
            </div>
            <div class="form-group col-sm-4">
                <label for="name_eng">Name<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="name_eng" name ="name_eng" value="{{$student->name_eng}}">
            </div>
            <div class="form-group col-sm-2">
                <label for="sex">性别<span class ="text-danger">*</span></label>
                <select name="sex" id="sex" class ="form-control" >
                    <optgroup>
                        <option value="{{$student->sex}}">{{$student->sex}}</option>
                    </optgroup>
                    <optgroup label="________">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </optgroup>
                </select>        
            </div>
            <div class="form-group col-sm-2">
                <label for="hair_color">发色<span class ="text-danger">*</span></label>
                <select name="hair_color" id="hair_color" class ="form-control" >
                    <optgroup>
                        <option value="{{$student->hair_color}}">{{$student->hair_color}}</option>
                    </optgroup>
                    <optgroup label="________">
                        <option value="黑色">黑色</option>
                        <option value="棕色">棕色</option>
                        <option value="微红">微红</option>
                        <option value="金铜">金铜</option>
                        <option value="白色">白色</option>
                    </optgroup>
                </select>        
            </div>
        </div>
        <div class="row my-0">
            <div class="form-group col-sm-3">
                <label for="birth_no">报身纸号码<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="birth_no" name ="birth_no" maxlength = "10" placeholder = "E123456" value="{{ $student->birth_no}}">
            </div>
            <div class="form-group col-sm-4">
                <label for="identity_no">身份证号码<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="identity_no" name ="identity_no" placeholder = "001122071234" value="{{$student->identity_no}}" maxlength ="15">

            </div>
            <div class="form-group col-sm-3">
                <label for="birth_date">出生日期<span class ="text-danger">*</span></label>
                @php
                    $birth_date = date("m/d/Y",strtotime($student->birth_date));
                @endphp
                <input type="text" class="form-control datepicker" id="student_birth_date" name ="student_birth_date" value="{{$birth_date}}">    
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-2">
                <label for="race">种族<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="race" name ="race" maxlength = "4" placeholder="华族" value="{{$student->race}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="religion">宗教<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="religion" name ="religion" placeholder ="佛教" value="{{$student->region}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="birth_date">国籍<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="country" name ="country" placeholder ="马来西亚" value="{{ $student->country}}">
            </div>
            <div class="form-group col-sm-3">
                <label for="personal_phone">个人电话</label>
                <input type="number" class="form-control" id="personal_phone" name ="personal_phone"  placeholder="60123456789"  value="{{$student->personal_phone}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-5">
                <label for="personal_email">个人电邮</label>
                <input type="email" class="form-control" id="personal_email" name ="personal_email"  placeholder="abc@gmail.com" value="{{$student->personal_email}}">
            </div>
            <div class="form-group col-sm-5">
                <label for="school_mail">学校电邮</label>
                <input type="email" class="form-control" id="school_mail" name ="school_mail"  placeholder="21000.student@jitsin-ind.edu.my" value="{{$student->school_email}}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-11">
                <label for="home_address">住家地址<span class ="text-danger">*</span></label>
                <input type="text" class="form-control" id="home_address" name ="home_address"  placeholder="Lot 1703, Jalan Chee Bee Noor, 14000 Bukit Mertajam" value="{{$student->home_address}}">
            </div>
        </div>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">父母资料</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">小学资料</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">中学资料</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="uec-tab" data-toggle="tab" href="#uec" role="tab" aria-controls="uec" aria-selected="false">统考成绩</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="prize_list-tab" data-toggle="tab" href="#prize_list" role="tab" aria-controls="prize_list" aria-selected="false">中学得奖记录</a>
            </li>
        </ul>

        <div class="tab-content bg-custom2" id="myTabContent">
            <div class="tab-pane fade  p-4 " id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row my-0">
                    <div class="form-group col-sm-3">
                        <label for="main_contact">主要联系人<span class ="text-danger">*</span></label>
                        <select name="main_contact" id="main_contact" class="form-control">
                            <optgroup>
                                <option value="{{$student->main_contact}}">{{$student->main_contact}}</option>
                            </optgroup>
                            <optgroup label="________">
                                <option value="父亲">父亲</option>
                                <option value="母亲">母亲</option>
                                <option value="监护人">监护人</option>
                            </optgroup>
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
                        <input type="text" class="form-control" id="father_chiname" name ="father_chiname" value="{{$student->fathername_chi}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="father_engname">Name</label>
                        <input type="text" class="form-control" id="father_engname" name ="father_engname" value="{{$student->fathername_eng}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="father_identity">身份证号码</label>
                        <input type="text" class="form-control" id="father_identity" name ="father_identity" placeholder ="661122071234" value="{{$student->father_identity}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="father_contact">联系电话</label>
                        <input type="number" class="form-control" id="father_contact" name ="father_contact" placeholder ="60123456789" value="{{$student->father_contact}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="father_email">电邮地址</label>
                        <input type="email" class="form-control" id="father_email" name ="father_email" value="{{$student->father_email}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="father_edulevel">教育程度</label>
                        <select name="father_edulevel" id="father_edulevel" class ="form-control" >
                            <optgroup>
                                <option value="{{$student->father_edulevel}}">{{$student->father_edulevel}}</option>
                            </optgroup>
                            <optgroup label="________">
                                <option value="小学">小学</option>
                                <option value="初中">初中</option>
                                <option value="高中">高中</option>
                                <option value="文凭">文凭</option>
                                <option value="学士">学士</option>
                                <option value="硕士">硕士</option>
                                <option value="博士">博士</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="father_occupation">职业</label>
                        <input type="text" class="form-control" id="father_occupation" name ="father_occupation" value="{{$student->father_occupation}}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5 class ="col-sm-6">母亲资料</h5>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="mother_chiname">姓名（中）</label>
                        <input type="text" class="form-control" id="mother_chiname" name ="mother_chiname" value="{{$student->mothername_chi}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mother_engname">Name</label>
                        <input type="text" class="form-control" id="mother_engname" name ="mother_engname" value="{{$student->mothername_eng}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mother_identity">身份证号码</label>
                        <input type="text" class="form-control" id="mother_identity" name ="mother_identity" placeholder ="661122071234" value="{{$student->mother_identity}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="mother_contact">联系电话</label>
                        <input type="number" class="form-control" id="mother_contact" name ="mother_contact" placeholder ="60123456789" value="{{$student->mother_contact}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mother_email">电邮地址</label>
                        <input type="email" class="form-control" id="mother_email" name ="mother_email" value="{{$student->mother_email}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="mother_edulevel">教育程度</label>
                        <select name="mother_edulevel" id="mother_edulevel" class ="form-control" >
                            <optgroup>
                                <option value="{{$student->mother_edulevel}}">{{$student->mother_edulevel}}</option>
                            </optgroup>
                            <optgroup label="________">
                                <option value="小学">小学</option>
                                <option value="初中">初中</option>
                                <option value="高中">高中</option>
                                <option value="文凭">文凭</option>
                                <option value="学士">学士</option>
                                <option value="硕士">硕士</option>
                                <option value="博士">博士</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mother_occupation">职业</label>
                        <input type="text" class="form-control" id="mother_occupation" name ="mother_occupation" value="{{$student->mother_occupation}}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h5 class ="col-sm-6">监护人资料</h5>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="guardian_chiname">姓名（中）</label>
                        <input type="text" class="form-control" id="guardian_chiname" name ="guardian_chiname" value="{{$student->guardianname_chi}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="guardian_engname">Name</label>
                        <input type="text" class="form-control" id="guardian_engname" name ="guardian_engname" value="{{$student->guardianname_eng}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="guardian_identity">身份证号码</label>
                        <input type="text" class="form-control" id="guardian_identity" name ="guardian_identity" placeholder ="661122071234" value="{{$student->guardian_identity}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="guardian_contact">联系电话</label>
                        <input type="number" class="form-control" id="guardian_contact" name ="guardian_contact" placeholder ="60123456789" value="{{$student->guardian_contact}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="guardian_email">电邮地址</label>
                        <input type="email" class="form-control" id="guardian_email" name ="guardian_email" value="{{$student->guardian_email}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="guardian_edulevel">教育程度</label>
                        <select name="guardian_edulevel" id="guardian_edulevel" class ="form-control" >
                            <optgroup>
                                <option value="{{$student->guardian_edulevel}}">{{$student->guardian_edulevel}}</option>
                            </optgroup>
                            <optgroup label="________">
                                <option value="小学">小学</option>
                                <option value="初中">初中</option>
                                <option value="高中">高中</option>
                                <option value="文凭">文凭</option>
                                <option value="学士">学士</option>
                                <option value="硕士">硕士</option>
                                <option value="博士">博士</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="guardian_occupation">职业</label>
                        <input type="text" class="form-control" id="guardian_occupation" name ="guardian_occupation" value="{{$student->guardian_occupation}}">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <h5 class ="col-sm-6">小学资料</h5>
                </div>
                <div class="row">
                    <div class="form-group col-sm-5">
                        <label for="primary_school">毕业小学<span class ="text-danger">*</span></label>
                        <input type="text" class="form-control" id="primary_school" name ="primary_school"  placeholder="日新小学（A）校" value="{{$student->primary_school}}">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="graduate_year">毕业年份<span class ="text-danger">*</span></label>
                        @php
                            $primary_year = date("m/d/Y",strtotime($student->primary_year));

                        @endphp
                        <input type="text" class="form-control datepicker" id="graduate_year" name ="graduate_year" value="{{$primary_year}}" >
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="primary_grade">小学操行<span class ="text-danger">*</span></label>
                        <input type="text" class="form-control" id="primary_grade" name ="primary_grade"  placeholder="A"  value="{{$student->primary_grade}}">
                    </div>
                </div>
                <br>
                <div class="row">
                <h5 class ="col-sm-6">小学成绩</h5>
                </div>
                <div class="row">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class='text-center'>国文理解</th>
                            <th scope="col" class='text-center'>国文作文</th>
                            <th scope="col" class='text-center'>英文理解</th>
                            <th scope="col" class='text-center'>英文作文</th>
                            <th scope="col" class='text-center'>华文理解</th>
                            <th scope="col" class='text-center'>华文作文</th>
                            <th scope="col" class='text-center'>数学</th>
                            <th scope="col" class='text-center'>科学</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_malay_comprehensive}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_malay_essay}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_english_comprehensive}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_english_essay}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_chinese_comprehensive}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_chinese_essay}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_math}}"></td>
                            <td><input type="text" class="form-control text-center" value ="{{$student->primary_sains}}"></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <br>
                <div class="row">
                    <h5 class ="col-sm-6">小学得奖记录</h5>
                </div>
                <div class="row p-2">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style ="width:25%" >比赛标题</th>
                            <th scope="col" style ="width:25%">主办单位</th>
                            <th scope="col" style ="width:20%">获得奖项</th>
                            <th scope="col" style ="width:20%">比赛日期</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($student->primary_Prize as $item)
                        <tr>
                        <td>{{$item->competition_title}}</td>
                        <td>{{$item->organizer}}</td>
                        <td>{{$item->prize}}</td>
                        <td>{{$item->competition_date}}</td>
                        <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Academic@primary_prize_del']]) !!}
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""  required>
                                <input type ="text" value ="{{$item->id}}" name ="id" hidden />
                                <input type="submit" name ="submit" value ="remove" class ="btn btn-danger btn-sm">
                            </div>
                        {!! Form::close() !!}
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan ="5"><button class = "btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#addprimaryprize">+</button></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="tab-pane fade p-4 show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <h5 class ="col-sm-6">班级讯息</h5>
                </div>
                <div class="row">
                    <table class="table table-bordered">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" style ="width:20%">年份</th>
                                <th scope="col" style ="width:40%">班级名称</th>
                                <th scope="col" style ="width:40%">班导师</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($student->classes as $class)
                            <tr>
                                <td>{{$class->year}}</td>
                                <td>{{$class->class_name}}</td>
                                <td>{{$class->user->id}} {{$class->user->name_chi}}师</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row">
                    <h5 class ="col-sm-6">在学优惠</h5>
                    <table class="table table-bordered ">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col" style ="width:20%">年份</th>
                                <th scope="col" style ="width:40%">优惠标题</th>
                                <th scope="col" style ="width:40%">备注</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($student->promotion as $promotion)
                            <tr>
                                <td>{{$promotion->pivot->year}}</td>
                                <td>{{$promotion->title}}</td>
                                <td>{{$promotion->pivot->remark}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="uec" role="tabpanel" aria-labelledby="uec-tab">
                <div class="row">
                    <h5 class ="col-sm-6">初中统考</h5>
                </div>
                <div class="row">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">年份</th>
                                <th scope="col">华文</th>
                                <th scope="col">国文</th>
                                <th scope="col">英文</th>
                                <th scope="col">数学</th>
                                <th scope="col">科学</th>
                                <th scope="col">历史</th>
                                <th scope="col">地理</th>
                                <th scope="col">美术</th>
                            </tr>
                        </thead>
                        <tbody>
                        {!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Academic@juec_update']]) !!}

                            @if(count($student->Juec) != 0 )
                                @foreach($student->Juec as $juec)
                                <tr>
                                    <input type="text" value = "{{$juec->id}}" class= "form-control text-center" name ="id"  hidden>
                                    <input type="text" value = "{{$student->id}}" class= "form-control text-center" name ="students_id"  hidden required>          
                                    <td><input type="number" value = "{{$juec->year}}" class= "form-control text-center" name ="year" readonly required></td>
                                    <td><input type="text" value = "{{$juec->chinese}}" class= "form-control text-center" name ="chinese" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->malay}}" class= "form-control text-center" name ="malay" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->english}}" class= "form-control text-center" name ="english" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->math}}" class= "form-control text-center" name ="math" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->sains}}" class= "form-control text-center" name ="sains" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->history}}" class= "form-control text-center" name ="history" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->geo}}" class= "form-control text-center" name ="geo" maxlength ="2" required></td>
                                    <td><input type="text" value = "{{$juec->art}}" class= "form-control text-center" name ="art" maxlength ="2" required></td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <input type="text" value = "" class= "form-control text-center" name ="id"  hidden>
                                    <input type="text" value = "{{$student->id}}" class= "form-control text-center" name ="students_id"  hidden required>          
                                    <td><input type="number"  class= "form-control text-center" name ="year" maxlength ="4" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="chinese" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="malay" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="english" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="math" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="sains" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="history" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="geo" maxlength ="2" required></td>
                                    <td><input type="text"  class= "form-control text-center" name ="art" maxlength ="2" required></td>
                                </tr>
                            @endif
                                <tr>
                                    <td colspan ="9"><input type="submit" value ="Save" class ="btn btn-sm btn-success"></td>
                                </tr>
                        {!! Form::close() !!}

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h5 class ="col-sm-6">高中统考</h5>
                </div>
                <div class="row">
                {!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\Academic@suec_update']]) !!}

                    @if(count($student->Suec) != 0)
                        @foreach($student->Suec as $suec)

                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">年份</th>
                                <th scope="col">华文</th>
                                <th scope="col">国文</th>
                                <th scope="col">英文</th>
                                <th scope="col">数学</th>
                                <th scope="col">高数</th>
                                <th scope="col">高数（一）</th>
                                <th scope="col">高数（二）</th>
                                <th scope="col">历史</th>
                            </tr>
                        </thead>
                        <tbody>
                                <input type="text" value = "{{$suec->id}}" class= "form-control text-center" name ="Suec_id"  hidden>
                                <input type="text" value = "{{$student->id}}" class= "form-control text-center" name ="Suec_students_id"  hidden required>          
                                <td><input type="text" value = "{{$suec->year}}" class= "form-control text-center" name ="Suec_year" readonly required></td>
                                <td><input type="text" value = "{{$suec->chinese}}" class= "form-control text-center" name ="Suec_chinese" ></td>
                                <td><input type="text" value = "{{$suec->malay}}" class= "form-control text-center" name ="Suec_malay" ></td>
                                <td><input type="text" value = "{{$suec->english}}" class= "form-control text-center" name ="Suec_english" ></td>
                                <td><input type="text" value = "{{$suec->math}}" class= "form-control text-center" name ="Suec_math" ></td>
                                <td><input type="text" value = "{{$suec->addmath}}" class= "form-control text-center" name ="Suec_addmath" ></td>
                                <td><input type="text" value = "{{$suec->addmath1}}" class= "form-control text-center" name ="Suec_addmath1" ></td>
                                <td><input type="text" value = "{{$suec->addmath2}}" class= "form-control text-center" name ="Suec_addmath2" ></td>
                                <td><input type="text" value = "{{$suec->history}}" class= "form-control text-center" name ="Suec_history" ></td>

                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">地理</th>
                                <th scope="col">生物</th>
                                <th scope="col">化学</th>
                                <th scope="col">物理</th>
                                <th scope="col">商业</th>
                                <th scope="col">簿记</th>
                                <th scope="col">经济学</th>
                                <th scope="col">电脑资讯</th>
                                <th scope="col">美术</th>
                            </tr>
                        </thead>
                        <tbody>
                                <td><input type="text" value = "{{$suec->geo}}" class= "form-control text-center" name ="Suec_geo"  ></td>
                                <td><input type="text" value = "{{$suec->bio}}" class= "form-control text-center" name ="Suec_bio" ></td>
                                <td><input type="text" value = "{{$suec->che}}" class= "form-control text-center" name ="Suec_che" ></td>
                                <td><input type="text" value = "{{$suec->fizik}}" class= "form-control text-center" name ="Suec_fizik" ></td>
                                <td><input type="text" value = "{{$suec->business}}" class= "form-control text-center" name ="Suec_business" ></td>
                                <td><input type="text" value = "{{$suec->bk}}" class= "form-control text-center" name ="Suec_bk" ></td>
                                <td><input type="text" value = "{{$suec->economic}}" class= "form-control text-center" name ="Suec_economic" ></td>
                                <td><input type="text" value = "{{$suec->computer}}" class= "form-control text-center" name ="Suec_computer" ></td>
                                <td><input type="text" value = "{{$suec->art}}" class= "form-control text-center" name ="Suec_art" ></td>

                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">美工</th>
                                <th scope="col">美工实习</th>
                                <th scope="col">会计</th>
                                <th scope="col" colspan = "6"></th>
                            </tr>
                        </thead>
                        <tbody>
                                <td><input type="text" value = "{{$suec->art_work}}" class= "form-control text-center" name ="Suec_art_work"  ></td>
                                <td><input type="text" value = "{{$suec->art_practical}}" class= "form-control text-center" name ="Suec_art_practical" ></td>
                                <td><input type="text" value = "{{$suec->account}}" class= "form-control text-center" name ="Suec_account" ></td>
                                <td colspan ="9"><input type="submit" value ="Save" class ="btn btn-sm btn-success"></td>
   
                        </tbody>
                    </table>
                        @endforeach
                    @else
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">年份</th>
                                <th scope="col">华文</th>
                                <th scope="col">国文</th>
                                <th scope="col">英文</th>
                                <th scope="col">数学</th>
                                <th scope="col">高数</th>
                                <th scope="col">高数（一）</th>
                                <th scope="col">高数（二）</th>
                                <th scope="col">历史</th>
                            </tr>
                        </thead>
                        <tbody>
                                <input type="text" value = "" class= "form-control text-center" name ="Suec_id"  hidden>
                                <input type="text" value = "{{$student->id}}" class= "form-control text-center" name ="Suec_students_id"  hidden required>          
                                <td><input type="text"  class= "form-control text-center" name ="Suec_year"  required></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_chinese" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_malay" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_english" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_math" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_addmath" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_addmath1" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_addmath2" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_history" ></td>

                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">地理</th>
                                <th scope="col">生物</th>
                                <th scope="col">化学</th>
                                <th scope="col">物理</th>
                                <th scope="col">商业</th>
                                <th scope="col">簿记</th>
                                <th scope="col">经济学</th>
                                <th scope="col">电脑资讯</th>
                                <th scope="col">美术</th>
                            </tr>
                        </thead>
                        <tbody>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_geo"  ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_bio" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_che" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_fizik" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_business" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_bk" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_economic" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_computer" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_art" ></td>

                        </tbody>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">美工</th>
                                <th scope="col">美工实习</th>
                                <th scope="col">会计</th>
                                <th scope="col" colspan = "6"></th>
                            </tr>
                        </thead>
                        <tbody>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_art_work"  ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_art_practical" ></td>
                                <td><input type="text"  class= "form-control text-center" name ="Suec_account" ></td>
                                <td colspan ="9"><input type="submit" value ="Save" class ="btn btn-sm btn-success"></td>
   
                        </tbody>
                    </table>
                    @endif
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="tab-pane fade p-4" id="prize_list" role="tabpanel" aria-labelledby="prize_list-tab">
                <h4>学术比赛</h4>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">比赛日期</th>
                            <th scope="col">比赛标题</th>
                            <th scope="col">主办单位</th>
                            <th scope="col">组别</th>
                            <th scope="col">级别</th>
                            <th scope="col">奖项</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->prize as $award)
                        <tr>
                            <td>{{$award->date}}</td>
                            <td>{{$award->title}}</td>
                            <td>{{$award->organizer}}</td>
                            <td>{{$award->group}}</td>
                            <td>{{$award->level}}</td>
                            <td>{{$award->pivot->award}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <h4>联课比赛</h4>
            </div>
        </div>




 <!-- PrimaryPrize -->
 {!! Form::open(['method'=>'post','action'=>['App\Http\Controllers\Academic@primary_prize_create']]) !!}

 <div class="modal fade" id="addprimaryprize" tabindex="-1" role="dialog" aria-labelledby="addprimaryprize" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">添加小学得奖记录</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="text" value ="{{$student->id}}" hidden name ="student_id">
            <label for="competition_title">比赛标题</label>
            <input type="text" class="form-control" id="competition_title" name ="competition_title" placeholder="越野赛跑" required maxlength ="200">
        </div>
        <div class="form-group">
            <label for="organizer">主办单位</label>
            <input type="text" class="form-control" id="organizer" name ="organizer" placeholder="英雄园居委会" required maxlength ="200">
        </div>
        <div class="form-group">
            <label for="prize">奖项</label>
            <input type="text" class="form-control" id="prize" name ="prize" placeholder="金奖" required maxlength ="50">
        </div>
        <div class="form-group">
            <label for="competition_date">比赛日期</label>
            <input type="text" class="form-control datepicker" id="competition_date" name ="competition_date" required >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">关闭</button>
        <input type="submit" value ="添加" class="btn btn-sm btn-success">
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}

    @endsection
</x-home-master>