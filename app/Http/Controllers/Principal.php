<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPosition;
use App\Models\UserEducation;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Promotions;
use App\Models\Students;
use App\Models\Promotions_students;

use App\Http\Requests\Promotion_Request;


use Illuminate\Support\Facades\Log;
use Hash;
use DateTime;


class Principal extends Controller
{
    public function menu(){
        $staff =  User::where('user_type','Admin')->orWhere('user_type','Teacher')->get();
        return view('Teacher.Principal.menu',['staff'=>$staff]);
    }

    public function view(){
        $user = User::all();
        $staff = 0;
        return view('Teacher.Principal.view',['user'=>$user, 'staff' => $staff]);
    }
    public function view2(Request $request){
            $input = $request->staff_id;
            $staff = User::where('id',$input)->first();
            $user = User::all();
            return view('Teacher.Principal.view2', array( 'staff' => $staff,'user'=>$user));
        }

    public function add(){
        $staff_id = User::orderBy('id','desc')->first();
        log::debug($staff_id);
        return view('Teacher.Principal.add',['staff_id'=>$staff_id]);
    }

    public function edit($id){
        $staff =  User::findorFail($id)->first();
        
        return view('Teacher.Principal.edit',['staff'=>$staff]);
    }
    public function save(Request $request){

        try {
            $new_staff = new User;
            $new_staff -> id = $request->staff_id;
            $new_staff -> user_type = 'Teacher';
            $new_staff -> name_chi = mb_strtoupper($request ->chi_name);
            $new_staff -> name_eng = mb_strtoupper($request ->eng_name);
            $new_staff -> email = $request->staff_id.".subject_teacher@jitsin-ind.edu.my";
            $new_staff -> password = Hash::make($request->id);
            $new_staff -> identity = $request ->identity;
            $new_staff -> personal_email = $request ->personal_email;
            $new_staff -> contact_home = $request->home_contact;
            $new_staff -> personal_contact = $request->personal_contact;
            $new_staff -> home_address = mb_strtoupper($request ->home_address);
            if($request->ex_SMJK != null){
                $new_staff -> ex_studentSMJK = $request->ex_SMJK;
            }
            if($request->ex_Ind != null){
                $new_staff -> ex_studentIND = $request->ex_Ind;
            }
            if($request->ex_Primary != null){
                $new_staff -> ex_studentPrimary = $request->ex_Primary;
            }
            if($new_staff->save()){
                $user_edu = new UserEducation;
                $user_edu ->user_id = $request->staff_id;
                $user_edu ->education_background = $request->edu1;
                $user_edu ->level = $request->edu_level1;
                $user_edu ->period = $request->edu_period1;
                $user_edu ->save();

                if($request -> edu2 != null){
                    $user_edu2 = new UserEducation;
                    $user_edu2 ->user_id = $request->staff_id;
                    $user_edu2 ->education_background = $request->edu2;
                    $user_edu2 ->level = $request->edu_level2;
                    $user_edu2 ->period = $request->edu_period2;
                    $user_edu2 ->save();
                }

                if($request -> edu3 != null){
                    $user_edu3 = new UserEducation;
                    $user_edu3 ->user_id = $request->staff_id;
                    $user_edu3 ->education_background = $request->edu3;
                    $user_edu3 ->level = $request->edu_level3;
                    $user_edu3 ->period = $request->edu_period3;
                    $user_edu3 ->save();
                }

                
            }
            $user_position = new UserPosition;
            $user_position ->user_id = $request->staff_id;
            $user_position ->position = $request->position;
            $join_date = DateTime::createFromFormat('j M Y',$request->join_date)->format("Y-m-d");
            $user_position ->Start_Date = $join_date;
            $user_position ->save();

            $request->session()->flash('message', '已成功添加'.$request->staff_id."档案");

        } catch (\Exception $e) {
            $request->session()->flash('message_error', '添加失败'.$request->staff_id."档案".$e->getMessage());
        }
        return back();
    }

    public function ed_delete(Request $request, $id){
        try {
            $edu_background = UserEducation::find($id)->first();
            $edu_background ->delete();
            $request->session()->flash('message_error', "移除成功");

        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', '移除失败'.$e->getMessage());
        }
        return back();
    }

    public function ed_create(Request $request){
        try {
            $user_edu = new UserEducation;
            $user_edu -> user_id = $request ->staff_id;
            $user_edu -> education_background =mb_strtoupper($request ->edu); 
            $user_edu -> level = $request ->edu_level;
            $user_edu -> period = $request ->edu_period;
            $user_edu ->save();
            $request->session()->flash('message', 'Qualification Added');

        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', 'Error'.$e->getMessage());
        }

        return back();
    }
    public function position_update(Request $request, $id){
        try {
            $user_position = UserPosition::where('id',$id)->first();
            $user_position -> End_Date = $request -> end_date;
            $user_position -> save();
            $request->session()->flash('message', 'Position Updated');
        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', 'Position Update Failed'.$e->getMessage());
        }
        return back();
    }

    public function position_create(Request $request){
        try {
            $user_position = new UserPosition;
            $user_position -> user_id = $request -> staff_id;
            $user_position -> position = $request -> position;
            $user_position -> Start_Date = $request -> Start_Date;
            $user_position -> save();
            $request->session()->flash('message', 'Position Updated');
        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', 'Position Update Failed'.$e->getMessage());
        }
        return back();
    }

    public function course_index(){
        $course = Course::all();
        return view('Teacher.Principal.Course_index',['course'=>$course]);
    }

    public function course_edit($id){
        $course = Course::where('id',$id)->first();
        $course_user = UserCourse::where('course_id',$id)->get();
        $all_user = User::all();
        $registered_user_id=[];
        $all_user_id=[];

        foreach($course_user as $registered_user){
            array_push($registered_user_id,$registered_user->user_id);
        }
        foreach($all_user as $all){
            array_push($all_user_id,$all->id);
        }
        $unregistered_user = array_diff($all_user_id,$registered_user_id);

        return view('Teacher.Principal.Course_edit',['course'=>$course, 'course_user'=>$course_user,'unregistered_user'=>$unregistered_user]);
    }

    public function course_attend(Request $request){
        $message = 'Added successfully ：';
        $message_error = 'Error : ';
        $attend_list = $request->user_id;
            foreach($attend_list as $attendant){
                try{
                    $record = new UserCourse;
                    $record->user_id = $attendant;
                    $record->course_id = $request->course_id;
                    $record->save();
                    $message = $message.' '.$attendant;
                    }
                catch (\Exception $e) {
                        $message_error = $message_error." ".$attendant;
                }
            }

        $request->session()->flash('message', $message);
        $request->session()->flash('message_error', $message_error);

        return back();
    }

    public function course_attend_del(Request $request){
        $message = 'Delete successfully ：';
        $message_error = 'Error : ';
        $attend_list = $request->user_id2;
        foreach($attend_list as $attendant){
            try{
                $record = UserCourse::where('user_id',$attendant)->where('course_id',$request->course_id2);
                $record->delete();
                $message = $message.' '.$attendant;

            }
            catch (\Exception $e) {
                $message_error = $message_error." ".$attendant;
            }
        }
        $request->session()->flash('message', $message);
        $request->session()->flash('message_error', $message_error);

        return back();
    }

    public function promotion(){
        $promotion = Promotions::all();
        return view('Teacher.Principal.promotion',['promotion' => $promotion]);
    }

    public function promotion_add(Promotion_Request $request){

        try{
            $clean_data = $request->validated();
            $new = new Promotions;
            $new->title = $clean_data['promo_title'];
            $new->category = $clean_data['category'];
            $new->remark = $clean_data['remark'];
            $new->save();
            $request->session()->flash('message', '成功添加在学优惠');

        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', '添加在学优惠失败');
        }
        return back();

    }
    
    public function promotion_details($id){
        $record = Promotions::where('id',$id)->first();
        $students =Students::all();
        return view('Teacher.Principal.promotion_detail',['record'=>$record,'students'=> $students]);
    }

    public function promotion_edit(Promotion_Request $request, $id){
        try{
            $clean_data = $request->validated();
            $record = Promotions::where('id',$id)->first();
            $record->title = $clean_data['promo_title'];
            $record->category = $clean_data['category'];
            $record->remark = $clean_data['remark'];
            $record->save();
            $request->session()->flash('message', '成功更新在学优惠');
            }
            catch (\Exception $e) {
                $request->session()->flash('message_error', '更新在学优惠失败');
            }
            return back();
    }
    public function promotion_delete(Request $request, $id){
        try{
            $record = Promotions::where('id',$id)->first();
            $record->delete();
            $request->session()->flash('message', '成功删除在学优惠');
            }
            catch (\Exception $e) {
                $request->session()->flash('message_error', '删除在学优惠失败');
            }
            return redirect()->route('principal.promotion');
    }

    public function promotion_students(Request $request){
            try{
                $new = new promotions_students;
                $new->students_id = $request->student_id;
                $new->promotions_id =$request->promotions_id;
                $new->year = $request->year;
                $new->remark = $request->remark;
                $new->save();
                $request->session()->flash('message', '成功更新在学优惠');
            }
            catch (\Exception $e) {
                $request->session()->flash('message_error', '更新在学优惠失败');
            }
            return back();
        
    }
    public function promotion_students_delete (Request $request, $id){
        try{
            $delete_id = promotions_students::where('id',$id);
            $delete_id->delete();

            $request->session()->flash('message', '删除成功');
        }
        catch (\Exception $e) {
            $request->session()->flash('message_error', '删除失败');
        }
        return back();        

    }
}
