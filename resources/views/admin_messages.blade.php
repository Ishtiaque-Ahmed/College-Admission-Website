<!DOCTYPE html>
<html>
<head>
@include('influx.head_style')
<style type="text/css">
@include('influx.toolbar')
body{
    background-color: white;
}
.container{
    width: 100%;
    height: 100px;
    padding-left: 0px;
    
}
.list-group{
	width: 70%;
}

</style>
</head>
<body>
<div class="container-fluid">
<ul class="topnav" id="myTopnav">
  <li style="padding-right : 800px"><a href="#home">Home</a></li>
  <li><a href="{{route('result_tab')}}">Result</a></li>
  <li><a href="{{route('m_box')}}">Messages</a></li>
  <li><a href="{{route('logoutadmin')}}">Log Out</a></li>
</ul>
<div class="container">
	<div class="row">
		<div class="col-md-4 content-box nav-list ">
			<div class="list-group">
				<a href="" class="list-group-item" title="ok">A choice</a>
				<a href="" class="list-group-item" title="ok">A choice</a>
				<a href="" class="list-group-item" title="ok">A choice</a>
				<a href="" class="list-group-item" title="ok">A choice</a>
				
			</div>

		</div>
	</div>
</div>
</body>
</html>