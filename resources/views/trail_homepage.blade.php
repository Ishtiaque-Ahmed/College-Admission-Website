<!DOCTYPE html>
<html>
<head>
@include('influx.head_style')
<style type="text/css">
@include('influx.toolbar')
body{
    background-color: white;
}
.container {
    width: 100%;
    height: 100px;
    padding-left: 0px;
    background-color: white;
}
#image_back{
    padding-left: 12%;
    vertical-align: middle;
}
#rotation
{
    width: 85%;
    height: 85%;
}
</style>
</head>
<body>
<div class="container-fluid">
<ul class="topnav" id="myTopnav">
  <li style="padding-right : 600px"><a href="{{route('home')}}">Home</a></li>
  <li><a href="{{route('apply')}}">Application</a></li>
  <li><a href="{{route('status')}}">Application Status</a></li>
  <li><a href="{{route('view_contact')}}">Contact</a></li>
  <li><a href="{{route('logout')}}">Log Out</a></li>
</ul>
<div class="well">
  <div id="image_back">
      <script type="text/javascript" language="javascript">
          var idxImage = 3; var myImages = new Array("HSC_result.jpg","sheikh3.jpg","sheikh_hasina.jpg", "sheikh2.jpg", "welcome.jpg");
          var i = setInterval(changeImage, 2500);
          function changeImage() {
              idxImage++;
              if (idxImage == myImages.length) idxImage=0;
              var root="images/"+myImages[idxImage];
              document.getElementById('rotation').src=root;
          } </script>


      <img id="rotation" src="images/welcome.jpg">
  </div>
</div>
</div>
</body>
</html>