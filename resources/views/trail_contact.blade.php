<!DOCTYPE html>
<html>
<head>
@include('influx.head_style')
<style type="text/css">
@include('influx.toolbar')
 div.kab{
    background-color:black;
    }
 div.over{
 	overflow-y:auto;
 }
 div.sizef{
 	display: inline-block;
 }
 div.right{
 	float: right;
 	
 }
 div.contain{
 	padding-left:40px;
 	padding-right:60px;
 	padding-top:20px;
 }
textarea.frost{
	width: 400px;
	height: 80px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	
	
}
hr{
	padding-top: 0px;
	border-color: white;
}

</style>


</head>
<body>
<div class="container-fluid">
 @if(count($errors)>0)
            <div>
                <ul>
                @foreach ($errors->all() as $value)
                    <li>
                    {{$value}}
                    </li>
                
                </ul>
                @endforeach
            </div>
  @endif
<ul class="topnav" id="myTopnav">
  <li style="padding-right : 600px"><a href="{{route('home')}}">Home</a></li>
  <li><a href="{{route('apply')}}">Application</a></li>
  <li><a href="{{route('status')}}">Application Status</a></li>
  <li><a href="{{route('view_contact')}}">Contact</a></li>
  <li><a href="{{route('logout')}}">Log out</a></li>
</ul>
<div class="container contain">
	<?php
	$user=Auth::user()->roll;
	foreach($sent as $ss)
	{
		if($ss->sender==$user)
		{
			echo '<div class="well well-md sizef">'."You wrote : ".$ss->message."</div>";
			echo "<hr>";
		
		}
		else
		{
			echo '<div class="well well-md sizef right">'."Admin wrote : ".$ss->message."</div>";
			echo "<hr>";
		}


	}


	?>
	<form action="{{route('send_message')}}" method="post">
		<div class="form-group">
		<textarea type="text" name="box" id="box" class="form-control frost">
		</textarea>
		<button class="btn btn-primary" type="submit" id="send">Send</button>	
		</div>
		<input type="hidden" name="_token" value="{{Session::token()}}">
	</form>

</div>



</div>
	

</body>
</html>

