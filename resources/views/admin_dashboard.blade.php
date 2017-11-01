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
    background-color: blue;
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
<h1> Admin</h1>
</div>
</body>
</html>