@extends('layouts.master')
@section('title', 'Email not found')
@section('header')
 <header class="navheader">
            <div class="container login-container">
                <a class="logo1 a-navbar" href="{{url('/')}}">
                    <img src="{{ URL::asset('public/images/upwork-logo.svg')}}" />
            </a>
          <div class="visible-md visible-lg desktop-navbar">

            <p class="nav navbar-nav navbar-right nav-pad-right gothamlightcus">
                <span></span>
                <a class="a" href="{{url('/')}}/ab/account-security/login">LogIn</a>
            </p>
          </div>
            </div>
       </header>
@endsection
@section('body')
<form action="login" method="post">
<div id="layout">
  <br><br><br><br><br>
 <div class="row">
 <div class="col-md-4 col-md-offset-4">
 <center>
   <div class="panel panel-info">
<!--      <div class="panel-heading">Company Details</div> -->
     <div class="panel-body">
       <ul class="list-group">
          <li class="list-group-item">Sorry!!!!!...Email does not exist...</li>
        </ul>
     </div>
   </div>
 </center>
</div>
</div>

</div>
</form>
@endsection


@section('footer')
<footer class="footer-navbar">
     <div class="container">
       <div class="row">
            <div>
                <div class="col-md-12 text-center  footer-margin">
                    <p class="copyright" id="p"> © 2015 - 2016 Upwork Global Inc.</p>
                    <a href="#" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Terms of Service</a>
                    </br>
                    <a href="#" id="a" onmouseout="this.style.color = '#7d7d7d'" class="footer-a">Cookie Policy</a>

                </div>

            </div>

       </div>
     </div>

     </footer>
 @endsection
