<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentCreate_Request;
use App\Http\Requests\Prize_Request;
use Illuminate\Support\Facades\Log;
use App\Models\Students;
use App\Models\students_primaryprize;
use App\Imports\JuecImport;
use App\Models\Juec;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SuecImport;
use App\Models\Suec;
use App\Models\Prize;

use Carbon\Carbon;


class Academic extends Controller
{
    public function menu(){
        return view('teacher.Academic.menu');
    }

    public function add(){
        return view('teacher.Academic.add');
    }

    public function create(StudentCreate_Request $request){

        $clean_data = $request->validated();
        $new_record = new Students;
        // log::debug($clean_data);
        // log::debug(gettype($clean_data));
        $new_record->id = $clean_data['student_id'];
        $new_record->entry_date =  date("Y/m/d", strtotime($clean_data['entry_date']));
        $new_record->entry_level = $clean_data['entry_level'];
        $new_record->student_type = $clean_data['student_type'];
        $new_record->name_chi = strtoupper($clean_data['name_chi']);
        $new_record->name_eng = strtoupper($clean_data['name_eng']);
        $new_record->sex = strtoupper($clean_data['sex']);
        $new_record->hair_color = strtoupper($clean_data['hair_color']);
        $new_record->birth_no = strtoupper($clean_data['birth_no']);
        $new_record->identity_no = strtoupper($clean_data['identity_no']);
        $new_record->birth_date = date("Y/m/d", strtotime($clean_data['student_birth_date']));
        $new_record->race = strtoupper($clean_data['race']);
        $new_record->region = strtoupper($clean_data['religion']);
        $new_record->country = strtoupper($clean_data['country']);
        $new_record->home_address = strtoupper($clean_data['home_address']);
        $new_record->primary_school = strtoupper($clean_data['primary_school']);
        $new_record->primary_year = date("Y/m/d", strtotime($clean_data['graduate_year']));
        $new_record->primary_grade = strtoupper($clean_data['primary_grade']);
        $new_record->main_contact = strtoupper($clean_data['main_contact']);
        $new_record->school_mail = $clean_data['student_id'].'.student@jitsin-ind.edu.my';
        $new_record->personal_email = strtoupper($clean_data['personal_email']);
        $new_record->main_contact = strtoupper($clean_data['main_contact']);
        $new_record->primary_malay_comprehensive = strtoupper($clean_data['primary_malay_comprehensive']);
        $new_record->primary_malay_essay = strtoupper($clean_data['primary_malay_essay']);
        $new_record->primary_english_comprehensive = strtoupper($clean_data['primary_english_comprehensive']);
        $new_record->primary_english_essay = strtoupper($clean_data['primary_english_essay']);
        $new_record->primary_math = strtoupper($clean_data['primary_math']);
        $new_record->primary_chinese_comprehensive = strtoupper($clean_data['primary_chinese_comprehensive']);
        $new_record->primary_chinese_essay = strtoupper($clean_data['primary_chinese_essay']);
        $new_record->primary_sains = strtoupper($clean_data['primary_sains']);
        $new_record->primary_mark = $clean_data['primary_mark'];
        $new_record->personal_phone = $clean_data['personal_phone'];
        $new_record->secondary_school = strtoupper($clean_data['secondary_school']);
        $new_record->secondary_year = date("Y/m/d", strtotime($clean_data['change_year']));
        $new_record->secondary_grade = strtoupper($clean_data['secondary_grade']);
        $new_record->fathername_chi = strtoupper($clean_data['father_chiname']);
        $new_record->fathername_eng = strtoupper($clean_data['father_engname']);
        $new_record->father_identity = $clean_data['father_identity'];
        $new_record->father_contact = $clean_data['father_contact'];
        $new_record->father_email = strtoupper($clean_data['father_email']);
        $new_record->father_edulevel = strtoupper($clean_data['father_edulevel']);
        $new_record->father_occupation = strtoupper($clean_data['father_occupation']);
        $new_record->mothername_chi = strtoupper($clean_data['mother_chiname']);
        $new_record->mothername_eng = strtoupper($clean_data['mother_engname']);
        $new_record->mother_identity = $clean_data['mother_identity'];
        $new_record->mother_contact = $clean_data['mother_contact'];
        $new_record->mother_email = strtoupper($clean_data['mother_email']);
        $new_record->mother_edulevel = strtoupper($clean_data['mother_edulevel']);
        $new_record->mother_occupation = strtoupper($clean_data['mother_occupation']);
        $new_record->guardianname_chi = strtoupper($clean_data['guardian_chiname']);
        $new_record->guardianname_eng = strtoupper($clean_data['guardian_engname']);
        $new_record->guardian_identity = $clean_data['guardian_identity'];
        $new_record->guardian_contact = $clean_data['guardian_contact'];
        $new_record->guardian_email = strtoupper($clean_data['guardian_email']);
        $new_record->guardian_edulevel = strtoupper($clean_data['guardian_edulevel']);
        $new_record->guardian_occupation = strtoupper($clean_data['guardian_occupation']);

        if( $new_record->save()){
            $request->session()->flash('message', '添加成功');

            return back();

        }else{
            $request->session()->flash('message_error', '添加失败');
            return back();
        }
    }

    public function edit(){
        $students = Students::all();
        return view('Teacher.Academic.edit',['students'=>$students]);
    }

    public function details($id){
        $student = Students::where('id',$id)->first();
        // $test = $student->classes;
        // foreach($test as $item){
        //     log::debug($item->user);
        // }
        return view('Teacher.Academic.details',['student'=>$student]);
    }

    public function primary_prize_del(Request $request){
        log::debug($request->all());
        $deleted = students_primaryprize::where('id', $request->id)->first();
        $deleted ->delete();
        return back();
    }

    public function primary_prize_create(Request $request){
        log::debug($request->all());
        $new_record = new students_primaryprize;
        $new_record ->competition_title = $request ->competition_title;
        $new_record ->students_id = $request ->student_id;
        $new_record ->organizer = $request ->organizer;
        $new_record ->prize = $request ->prize;
        $new_record ->competition_date = date("Y-m-d", strtotime($request ->competition_date));
        if($new_record->save()){
            $request->session()->flash('message', '小学得奖记录添加完成');
        }else{
            $request->session()->flash('message_error', '小学得奖记录添加失败');
        }
        return back();

    }

    public function juec(){
        $import_error = [];
        return view('Teacher.academic.juec',['import_error' =>$import_error]);
    }

    public function juec_import(Request $request){
            $import_error = [];
            $file = request()->file('Juec_excel')->getClientOriginalExtension();
            if($file ="xlsx"){
                $import = new JuecImport();
                $import->import(request()->file('Juec_excel'));
                $error =  $import->errors();

                foreach($error as $item){
                        $msg = $item->getBindings();
                        array_push($import_error,$msg[1]);
                }
            }else{
                $request->session()->flash('message_error', 'Invalid File Extension');
            }

        return view('Teacher.academic.juec',['import_error'=>$import_error]);
    }

    public function juec_update(Request $request){
        if($request->id == null){
            $new = new Juec;
            $new->students_id = $request->students_id;
            $new->year = $request->year;
            $new->chinese = strtoupper($request->chinese);
            $new->malay = strtoupper($request->malay);
            $new->english = strtoupper($request->english);
            $new->math = strtoupper($request->math);
            $new->sains = strtoupper($request->sains);
            $new->history = strtoupper($request->history);
            $new->geo = strtoupper($request->geo);
            $new->art = strtoupper($request->art);
            $new->save();
            $request->session()->flash('message', 'Junior UEC updated');

        }else if($request->id != null){
            $new = Juec::where('id',$request->id)->where('students_id',$request->students_id)->first();
            $new->students_id = $request->students_id;
            $new->chinese = strtoupper($request->chinese);
            $new->malay = strtoupper($request->malay);
            $new->english = strtoupper($request->english);
            $new->math = strtoupper($request->math);
            $new->sains = strtoupper($request->sains);
            $new->history = strtoupper($request->history);
            $new->geo = strtoupper($request->geo);
            $new->art = strtoupper($request->art);
            $new->save();
            $request->session()->flash('message', 'Junior UEC updated');

        }else{
            $request->session()->flash('message_error', 'Something Error');
        }
        return back();
    }

    public function suec(){
        $import_error = [];
        return view('Teacher.academic.suec',['import_error' =>$import_error]);
    }
    public function suec_import(Request $request){
        $import_error = [];
        $file = request()->file('Suec_excel')->getClientOriginalExtension();
        if($file ="xlsx"){
            $import = new SuecImport();
            $import->import(request()->file('Suec_excel'));
            $error =  $import->errors();

            foreach($error as $item){
                    $msg = $item->getBindings();
                    array_push($import_error,$msg[1]);
            }
        }else{
            $request->session()->flash('message_error', 'Invalid File Extension');
        }

    return view('Teacher.academic.suec',['import_error'=>$import_error]);
    }
    public function suec_update(Request $request){
        if($request->id == null){
            $new = new Suec;
            $new->students_id = $request->Suec_students_id;
            $new->year = $request->Suec_year;
            $new->chinese = strtoupper($request->Suec_chinese);
            $new->malay = strtoupper($request->Suec_malay);
            $new->english = strtoupper($request->Suec_english);
            $new->math = strtoupper($request->Suec_math);
            $new->addmath = strtoupper($request->Suec_addmath);
            $new->addmath1 = strtoupper($request->Suec_addmath1);
            $new->addmath2 = strtoupper($request->Suec_addmath2);
            $new->history = strtoupper($request->Suec_history);
            $new->geo = strtoupper($request->Suec_geo);
            $new->bio = strtoupper($request->Suec_bio);
            $new->che = strtoupper($request->Suec_che);
            $new->fizik = strtoupper($request->Suec_fizik);
            $new->business = strtoupper($request->Suec_business);
            $new->bk = strtoupper($request->Suec_bk);
            $new->economic = strtoupper($request->Suec_economic);
            $new->computer = strtoupper($request->Suec_computer);
            $new->art = strtoupper($request->Suec_art);
            $new->art_work = strtoupper($request->Suec_art_work);
            $new->art_practical = strtoupper($request->Suec_art_practical);
            $new->account = strtoupper($request->Suec_account);
            $new->save();
            $request->session()->flash('message', 'Senior UEC updated');

        }else if($request->id != null){
            $new = Suec::where('id',$request->Suec_id)->where('students_id',$request->Suec_students_id)->first();
            $new->students_id = $request->Suec_students_id;
            $new->year = $request->Suec_year;
            $new->chinese = strtoupper($request->Suec_chinese);
            $new->malay = strtoupper($request->Suec_malay);
            $new->english = strtoupper($request->Suec_english);
            $new->math = strtoupper($request->Suec_math);
            $new->addmath = strtoupper($request->Suec_addmath);
            $new->addmath1 = strtoupper($request->Suec_addmath1);
            $new->addmath2 = strtoupper($request->Suec_addmath2);
            $new->history = strtoupper($request->Suec_history);
            $new->geo = strtoupper($request->Suec_geo);
            $new->bio = strtoupper($request->Suec_bio);
            $new->che = strtoupper($request->Suec_che);
            $new->fizik = strtoupper($request->Suec_fizik);
            $new->business = strtoupper($request->Suec_business);
            $new->bk = strtoupper($request->Suec_bk);
            $new->economic = strtoupper($request->Suec_economic);
            $new->computer = strtoupper($request->Suec_computer);
            $new->art = strtoupper($request->Suec_art);
            $new->art_work = strtoupper($request->Suec_art_work);
            $new->art_practical = strtoupper($request->Suec_art_practical);
            $new->account = strtoupper($request->Suec_account);
            $new->save();
            $request->session()->flash('message', 'Senior UEC updated');

        }else{
            $request->session()->flash('message_error', 'Something Error');
        }
        return back();
    }


    public function prize(){
        $academic = Prize::where('cateogory','学术 Academic')->get();
        return view('Teacher.academic.prize',['academic'=>$academic]);
    }

    public function prize_edit($id){
        $academic = Prize::where('id',$id)->first();
        $students = Students::all();
        return view('Teacher.academic.prize_edit',['academic'=>$academic, 'students'=>$students]);
    }

    public function prize_save(Prize_Request $request){
        $clean_data = $request->validated();
        $record = Prize::where('id',$clean_data['id'])->first();
        $record->title = $clean_data['title'];
        $record->date = date("Y/m/d", strtotime($clean_data['date']));
        $record->organizer =  $clean_data['organizer'];
        $record->group =  $clean_data['group'];
        $record->level =  $clean_data['level'];
        if( $record->save()){
            $request->session()->flash('message', '更新成功');
            return back();
        }else{
            $request->session()->flash('message_error', '更新失败');
            return back();
        }
    }


}
