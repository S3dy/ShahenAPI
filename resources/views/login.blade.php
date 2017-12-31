
<html>

   <head>
      <title>Login Page</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <style type="text/css">
         h1
         {
            color: #C2185B;
         }
         body
         {
            border: solid;
            border-color: grey;
            background-color: #212121;
         }
         #but
         {
          background-color: #AD1457; /* Green */
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
         }
         #d
         {
            border: solid;
            border-style: outset;
         }

         td
         {
            color: white;
            font-family: calibri;
            font-size: 30px;
            font-color:#F48FB1;
         }

      </style>
   </head>
   
   <body>
      <form action = "/check" method = "post">
       <input type = "hidden" name = "_token" value ="<?php echo csrf_token(); ?>">
      <br/><br/><br/>
      <div id=d>
      <center><h1>Login Page</h1>
         <table>
            <tr>
            <tr>
               <td>Email:</td>
               <td><input type='text' name='email' required="required" /></td>
            </tr>
             <tr>
               <td>Password:</td>
               <td><input type='password' name='password' required="required" /></td>
         </table>
         <br/>
         <input type = 'submit' id="but" value = "Login" />
      </center>
      <br/ ></div>
     	</form>
   </body>
</html>