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
  <li style="padding-right : 600px"><a href="#home">Home</a></li>
  <li><a href="{{route('apply')}}">Result</a></li>
  <li><a href="{{route('m_box')}}">Messages</a></li>
  <li><a href="{{route('logoutadmin')}}">Log Out</a></li>
</ul>

	<div class="well">
	<form action="{{route('generate')}}" method="post">
  <!--<div class="form-group">
  <label>
    Name
  </label>
  <input type="text" class="form-control" name="name"  id="name">
  <label>
        SSC Roll
    </label>
    <input type="text" class="form-control" name="roll" id="roll">
    <label>
        Password
    </label>
    <input type="password" class="form-control" name="password" id="password">
        <div class="row">
            <div class="col-xs-6">
             <button  style="margin-top : 15px" name="log" value="log" type="submit" class="btn btn-primary" >Log in</button>
         </div>
           <div class="col-xs-6">
                <button  style="margin-top : 15px" name="sign" value="sign" type="submit" class="btn btn-primary" >Sign up</button>
            </div>
        
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </div>
    </div>  -->
	<fieldset>
		<legend>Publish</legend>
		<div class="form-group">

            <div class="col-md-4">
                <button id="pop" name="pop" value="pop" class="btn btn-primary" type="submit">Populate</button>
            </div>
            <div class="col-md-4">
            <button id="result" name="result" value="result" class="btn btn-primary" type="submit">Result</button>
            </div>
            <div class="col-md-4">
            <button id="produce" name="produce" value="produce" class="btn btn-success" type="submit">Prepare Result</button>
            </div> 
        </div>
	</fieldset>
		<input type="hidden" name="_token" value="{{Session::token()}}">
                     
	</form>
		

	</div>
</div>
</body>
</html>

