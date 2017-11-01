<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\User;
use App\Choice;
use DB;
use Illuminate\Support\Facades\Auth;
class basiccontroller extends Controller
{
    //
	//private $setup="ok";
    public function homepage()
    {
    	return view('trail_homepage');
    }
    public function start()
    {
    	return view('trail_form');
    }
    public function apply()
    {

    	return view('trail_application_form');
    }
    public function view_contact()
    {
    	$temp_roll=Auth::user()->roll;
    	//$rcv=DB::table('messages')->where('reciever',$temp_roll)->get();
    	$sent=DB::table('messages')->where('sender',$temp_roll)->orwhere('reciever',$temp_roll)->get();
    	//,'recieve'=>$rcv]
    	return view('trail_contact',['sent'=>$sent]);
    }
    public function log_out()
    {
    	Auth::logout();
    	//Session::flush(); does not work maybe should use session in heading?
    	return redirect()->route('start');

    }


    public function send_message(Request $request)
    {
    		$rcv=-1;
    		$temp_roll=Auth::user()->roll;
    		$body=trim($request['box']);
    		DB::table('messages')->insert(['sender'=>$temp_roll,'message'=>$body,'reciever'=>$rcv]);
    		return redirect()->route('view_contact');
    }



    public function status()
    {
    	$user_roll=Auth::user()->roll;
    	$selection=DB::select('select * from choices where roll = ?',[$user_roll]);
    	$alloted=DB::select('select * from final_result where roll = ?',[$user_roll]);
    	$college_names=DB::select('select college_code,college_name from college_list');
        $temp_sel =array();
        $temp_alot=array(-1);

        foreach ($college_names as $j)
        {
            //else if($j->college_code==$selection->choice2);

            if($j->college_code==$selection[0]->choice1)
            {
                array_push($temp_sel,$j->college_name);
            }
            if($j->college_code==$alloted[0]->allotted_college)
            {
                $temp_alot[0]=$j->college_name;
            }
        }
        foreach ($college_names as $j)
        {
            if($j->college_code==$selection[0]->choice2)
            {
                array_push($temp_sel,$j->college_name);
            }
            //else if($j->college_code==$selection->choice2);

        }
        foreach ($college_names as $j)
        {
            if($j->college_code==$selection[0]->choice3)
            {
                array_push($temp_sel,$j->college_name);
            }
            //else if($j->college_code==$selection->choice2);

        }


    	//dd($alloted);
    	//echo $selection[0]->roll;
    	//echo $alloted[0]->roll;
    	//return;
    	return view('application_status',['selection'=>$temp_sel,'alloted'=>$temp_alot]);
    }

	public function initiate(Request $request)
	{
			//dd($request->all());
			if($request->has('log'))
			{
				if($this->postSignIn($request)){
					return redirect()->route('home');
				}
				else 
					return redirect()->back();

			}
			elseif ($request->has('sign')) {
				
				if($this->postSignUp($request)){
				return redirect()->route('home');
				}
				else 
				return redirect()->back();

			}

			
			return;

			//app key :: base64:E0LCfaK3L03+tR9ac5QVRudSJRe913P5gdLS2G+CS8E=
	}





	/*(public function postSignUp(Request $request)
	{


		$this->validate($request,[
			'name'=>'required|max:15|unique:users',
			'roll'=>'required|max:6|unique:users',
			'password'=>'required|min:3'
			]);
		$name=$request['name'];
		$roll=$request['roll'];
		$password=bcrypt($request['password']);
		$user= new User();
		$user->name=$name;
		$user->roll=$roll;
		$user->password=$password;
		$user->save();
		return ;
	}*/
	public function save_application(Request $request)
	{	
		$this->validate($request,[
			'mobile'=>'required|min:3',
			'ch1'=>'required',
			'ch2'=>'required',
			'ch3'=>'required'

			]);

		$temp_name=Auth::user()->name;
		$temp_roll=Auth::user()->roll;

		$get=DB::table('choices')->where('roll',$temp_roll)->get();
		//echo $get[0]->roll;
		//echo $get->count()."<br>";
		if($get->count())
		{
			DB::table('choices')->where('roll',$temp_roll)->
			update(['mobile'=>$request['mobile'],'choice1'=>$request['ch1'],'choice2'=>$request['ch2'],'choice3'=>$request['ch3']]);
		}
		else
		{
			$take=new Choice();
			$take->name=$temp_name;
			$take->roll=$temp_roll;
			$take->mobile=$request['mobile'];
			$take->choice1=$request['ch1'];
			$take->choice2=$request['ch2'];
			$take->choice3=$request['ch3'];
			$take->save();
			
		}
		//return view('trail_homepage');
		$this->setup="response saved";
			return redirect()->back()->with(['set'=>'response saved']);


	}


	public function postSignUp(Request $request)
	{

		/*$all_data=DB::table('student_mark')->get();


		foreach ($all_data as $data){
		$user= new User();
		$user->name=$data->name;
		$user->roll=$data->roll;
		$user->password=bcrypt($data->reg);

		$user->save();
		}*/
		return false ;
	}

	
		public function postSignIn(Request $request)
	{
			$this->validate($request,[
			'name'=>'required',
			'roll'=>'required',
			'password'=>'required|min:3'
			]);
		$name=$request['name'];
		$roll=$request['roll'];
		$ss=$request['password'];  
		
		if(Auth::attempt(['name'=>$name,'roll'=>$roll,'password'=>$ss]))
			{
				
				return true;
			}
		return false;
		
	}
}
