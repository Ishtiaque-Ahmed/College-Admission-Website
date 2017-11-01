<!DOCTYPE html>
<html>
<head>
@include('influx.head_style')
<style type="text/css">
@include('influx.toolbar')
@include('modal_class')
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
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <ul>
                    @foreach ($errors->all() as $value)
                        <li>
                            {{$value}}
                        </li>

                </ul>
                @endforeach
            </div>

        </div>
        @include('modal_js')

    @endif
<ul class="topnav" id="myTopnav">
  <li style="padding-right : 600px"><a href="{{route('home')}}">Home</a></li>
  <li><a href="{{route('apply')}}">Application</a></li>
  <li><a href="{{route('status')}}">Application Status</a></li>
  <li><a href="{{route('view_contact')}}">Contact</a></li>
  <li><a href="{{route('logout')}}">Log Out</a></li>
</ul>
</div>
	<?php
	//echo $message."<br>";
		if(session()->has('set'))
		{
			echo session('set');
		}
		//echo Auth::user()->roll;
		//it works!
	?>
   <div class="container">
        <div class="row">
            <div class="col-sm-6 ">
                <form action="{{route('done')}}" method="post" class="form-horizontal">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Fill in the necessary information</legend>

                        <!-- Text input-->
                     <!--   <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Name</label>
                            <div class="col-md-4">
                                <input id="name" name="name" type="text" class="form-control input-md" required="">
                              
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="roll">SSC Roll</label>
                            <div class="col-md-4">
                             <input id="roll" name="roll" type="text" class="form-control input-md">
                               
                            </div>
                        </div>-->

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mobile">Mobile Number</label>
                            <div class="col-md-4">
                                <input id="mobile" name="mobile" type="text" class="form-control input-md">
                                
                            </div>
                          </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="ch1">Choice 1</label>
                            <div class="col-md-4">
                                <input id="ch1" name="ch1" type="text" class="form-control input-md">
                                
                            </div>
                          </div>
                           <div class="form-group">
	                            <label class="col-md-4 control-label" for="ch2">Choice 2</label>
	                            <div class="col-md-4">
	                                <input id="ch2" name="ch2" type="text" class="form-control input-md">
	                                
	                            </div>
	                        </div>
                           <div class="form-group">
	                            <label class="col-md-4 control-label" for="ch3">Choice 3</label>
	                            <div class="col-md-4">
	                                <input id="ch3" name="ch3" type="text" class="form-control input-md">
	                                
	                            </div>
                            </div>

                           <div class="form-group">
	                            <label class="col-md-4 control-label"></label>
	                            <div class="col-md-4">
	                                <button id="bookappointment" name="bookappointment" class="btn btn-primary">Apply</button>
	                            </div>
                        	</div>
                        	 <input type="hidden" name="_token" value="{{Session::token()}}">
                     
                        

                    </fieldset>
                </form>
            </div>
            <div class="col-sm-6 container over">
			 <fieldset>
			 <legend>College Names and Codes</legend>
			<table class="table table-striped">
				<thead> 	
				<th>College Name</th>
				<th>Code</th>
				</thead>
			<tbody>
				<tr>
				<td>Notre Dame College</td>
				<td>100</td>
				</tr>
				<tr>
				<td>Dhaka College</td>
				<td>101</td>
				</tr>
				<tr>
				<td>Dhaka City College</td>
				<td>102</td>
				</tr>
				<tr>
				<td>Dhaka Residential Model College</td>
				<td>103</td>
				</tr>
				<tr>
				<td>Govt. Bangla College</td>
				<td>104</td>
				</tr>
				<tr>
				<td>Govt. Science College</td>
				<td>105</td>
				</tr>
				<tr>
				<td>Holy Cross College</td>
				<td>106</td>
				</tr>
				<tr>
				<td>Viqarunnessa Noon College</td>
				<td>107</td>
				</tr>
				<tr>
				<td>Dhaka International College</td>
				<td>108</td>
				</tr>
				<tr>
				<td>Dhaka Imperial College</td>
				<td>109</td>
				</tr>
				<tr>
				<td>Govt. Azizul Hoque College</td>
				<td>110</td>
				</tr>
				<tr>
				<td>Milestone College</td>
				<td>111</td>
				</tr>
				<tr>
				<td>Mohammadpur Degree College</td>
				<td>112</td>
				</tr>
				<tr>
				<td>Chittagong College</td>
				<td>113</td>
				</tr>
				<tr>
				<td>Royal College</td>
				<td>114</td>
				</tr>
				<tr>
				<td>Kings College</td>
				<td>115</td>
				</tr>

			</tbody>
				
			</table>
				

			</p>   
			</fieldset> 			
    		</div>
        </div>
    </div>
    	
    
 
</body>
</html>

