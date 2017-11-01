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
@include('result_table')
    #par{
    text-align: center;
}
</style>


</head>
<body>
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
  <li><a href="{{route('logout')}}">Log Out</a></li>
</ul>

	<?php
		//echo Auth::user()->roll;
		//it works!
	?>
    <div id="par"class="well">
        <h2>Your Choices are :</h2>
        <table id="customers">
            <tr>
                <th>Choice No.</th>
                <th>College Name</th>

            </tr>
	<?php
		//echo implode(" ",$selection[0]);
        echo '<tr>';
		echo  '<td>'.'1'.'</td>';
        echo  '<td>'.$selection[0].'</td>';
		echo '</tr>';
        echo '<tr>';
        echo  '<td>'.'2'.'</td>';
        echo  '<td>'.$selection[1].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo  '<td>'.'3'.'</td>';
        echo  '<td>'.$selection[2].'</td>';
        echo '</tr>';
        echo '</table>';
		if($alloted==NULL)
		echo "Colleges have not been allocated yet";
		elseif ($alloted[0]==-1) {
			echo "Sorry u did not pass";
		}
		else
		{
			echo "Congratulations<br>";
			echo "You have been accepted in ".$alloted[0]."<br>";
		}
		//echo $alloted->roll;
		//echo implode(" ",$alloted);


    ?>
    </div>
</div>
</body>
</html>

