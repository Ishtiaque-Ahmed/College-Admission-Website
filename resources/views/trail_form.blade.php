<!DOCTYPE html>
<html>
<head>
    @include('influx.head_style')
    
  <style type="text/css">
    form{
    padding-top: 1cm;
    margin : 0 auto;
    width :450px;
    height: 1350px;
    }
    button.rightshift{
        float: right;
    }
   
    </style>

</head>
<body>
<h1 style="padding-left : 400px">Welcome to College Admission</h1>
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
    
    
        
       

       
<form action="{{route('signup')}}" method="post">
<div class="well">
	<div class="form-group">
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
          <!-- <div class="col-xs-6">
                <button  style="margin-top : 15px" name="sign" value="sign" type="submit" class="btn btn-primary rightshift" >Sign up</button>
            </div>-->
        
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </div>
    </div>  
</div>
</form>
</div>   
</body>
</html>

