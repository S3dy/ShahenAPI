<html>

   <head>
      <title>Registration</title>

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
          background-color: #C2185B; /* Green */
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
        <form action = "/insert" method = "post" enctype="multipart/form-data">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <br/><br/><br/>
      <center><h1>Sign Up</h1>
         <table>
            <tr>
               <td>Name:</td>
               <td><input type='text' name='uname' required="required" /></td>
            </tr>
            <tr>
            <tr>
               <td>Email:</td>
               <td><input type='email' name='email' required="required" /></td>
            </tr>
             <tr>
               <td>Password:</td>
               <td><input type='password' name='password' required="required" /></td>
            </tr>
             <tr>
               <td>company name:</td>
               <td><input type='text' name='cmpnyname' /></td>
            </tr>
            <tr>
               <td></td>
               <td>
               <br>
                  <input type = 'submit' id='but' value = "Register"/>
               <br>
               <br>
                 <a href="login1"> <input type="button" id='but' name="log" value="Login"></a>
               </td>
            </tr>
         </table>
      </center>
         
			
      </form>

   </body>
</html>