<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Admin;
use App\Choice;
use DB;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
	public function admin_dashboard()
	{
		return view('admin_dashboard');
	}
	public function result_tab()
	{
		return view('admin_result');
	}
	public function log_out()
	{
		Auth::logout();
		return redirect()->route('something');
	}
	public function message_box()
	{
		return view('admin_messages');
	}
	public function produce_result(Request $request)
	{
			//dd($request->all());
			//echo "dumped";
			if($request->has('pop'))
			{	

				echo "already populated";
				/*$names=DB::table('student_mark')->get();
				echo $names[0]->name;
				foreach ($names as $student) {
					$choice= new choice();
					$choice->name=$student->name;
					$choice->roll=$student->roll;
					$choice->mobile=rand();
					$choice->choice1=rand(100,115);
					$choice->choice2=rand(100,115);
					$choice->choice3=rand(100,115);
					$choice->save();

				}*/

			}
			elseif ($request->has('result')) 
			{
				echo "already list created";
				/*for($i=100;$i<116;$i++)
				{
					//echo $i."<br>";
					$rand_name="college".$i;
					echo $rand_name." ";
					$sits=rand(4,10);
					echo "sits ".$sits."<br>";
					DB::table('college_list')->insert(['college_name'=>$rand_name,'college_code'=>$i,'no_of_seats'=>$sits,'available_seats'=>$sits]);
				}*/

			}
			elseif ($request->has('produce'))
			{
						$flag=1;
						$students=DB::select(DB::raw("SELECT temp.name,temp.roll,temp.total_marks,choices.choice1,choices.choice2,choices.choice3 from
							(SELECT name,roll,(physics+chemistry+math)AS total_marks FROM student_mark)temp,choices
								WHERE choices.roll=temp.roll
								ORDER BY temp.total_marks desc"));


						$sql="insert into final_result(roll,allotted_college) values ";
						//dd($students);
						foreach ($students as $std) {
							//echo $std->name." ".$std->roll." ".$std->total_marks." ".$std->choice1."<br>";
							
							$selected=DB::select(DB::raw("SELECT college_code,available_seats from college_list WHERE (college_code='$std->choice1'|| college_code='$std->choice2'||college_code='$std->choice3') AND available_seats>0
								ORDER BY
									case college_code
										WHEN '$std->choice1' THEN 1
										WHEN '$std->choice2' THEN 2
										when '$std->choice3' then 3
										end"));
							if($selected)
							{
								$calc=$selected[0]->available_seats-1;
								//echo "calculation ".$calc."<br>";
								DB::table('college_list')
								->where('college_code',$selected[0]->college_code)
								->update(['available_seats'=>$calc]);


								if($flag==1)
								{
									$attach="(".$std->roll.",".$selected[0]->college_code.")";
									$sql=$sql.$attach;
								}
								else
								{
									$attach=",(".$std->roll.",".$selected[0]->college_code.")";
									$sql=$sql.$attach;
								}

							}
							//echo "college is".$selected[0]->college_code."<br>";
							else 
								{
									$attach=",(".$std->roll.","."-1".")";
									$sql=$sql.$attach;

									echo "empty<br>";
								}

							
							$flag=0;

						}
						$sql.=";";

						$token=DB::select(DB::raw($sql));
						echo $sql;


			}
			return;
			//return redirect()->back();
	}


	public function front()
	{
		return view('admin_form');
	}
	public function get_admin(Request $request)
	{
		if($request->has('sign'))
		{
		$this->validate($request,[
			'name'=>'required',
			'password'=>'required|min:3'
			]);
		$data= new Admin();
		$data->name=$request['name'];
		$data->role='superuser';
		$data->password=bcrypt($request['password']);
		$data->save();
		//echo "done";
		return redirect()->back();
		}
		else
		{
			if($this->admin_check($request))
			{
				return redirect()->route('front');
			}
			else
				return redirect()->back();
		}

	}
    	

    	public function admin_check(Request $request)
	{
			$this->validate($request,[
			'name'=>'required',
			'password'=>'required|min:3'
			]);
		$name=$request['name'];
		//$roll=$request['roll'];
		$ss=$request['password'];  
		
		if(Auth::guard('admin')->attempt(['name'=>$name,'password'=>$ss]))
			{
				//echo "ok";
				return true;
			}
		//echo "not ok";
		return false;
		
	}
}
