<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription Form</title>
    <style type="text/css">
        .styled-table {
             border-collapse: collapse;
             margin: 25px 0;
             font-size: 0.9em;
             font-family: sans-serif;
             /* min-width: 400px; */
             width: 100%;
             margin: 0 auto;
             box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
         }
         .styled-table thead tr {
             background-color: #009879;
             color: #ffffff;
             text-align: left;
         }
         .styled-table th,
         .styled-table td {
             padding: 5px 5px;
         }
         .styled-table tbody tr {
             border-bottom: 1px solid #dddddd;
         }
 
         .styled-table tbody tr:nth-of-type(even) {
             background-color: #f3f3f3;
         }
 
         .styled-table tbody tr:last-of-type {
             border-bottom: 2px solid #009879;
         }
         
         .text-center{
             text-align: center;
         }
         .text-right{
             text-align: right;
         }
         .text-left{
             text-align: left;
         }
     </style>
</head>


<body>
<div class="container" style="margin-top: -30px;">
<div class="row">
    <div class="col-md-12">
       <table width="100%">
           <tr>
               <td class="text-center" width="15%">
                <img src="{{ public_path('/uploads/logo.jpg')}}" style="width: 100px; height: 100px;">
               </td>
               <td class="text-center" width="85%">
                <h2 style="text-transform: uppercase; color: #009879;"><strong>Chatdoc Nigeria</strong></h2>
                <h5 style="margin-top: -10px;"><strong>Tel: (234) 806 178 9101 | website: www.chatdoct.com | Email: support@chatdoct.com</strong></h5>
                {{-- <h5 style="margin-top: -20px;"><strong>{{$school->address}}</strong></h5> --}}
            </td>

           </tr>
       </table>
       <div style="margin-top: -20px;">
        <h4 style="text-transform: uppercase; text-align: center; border-bottom: 2px solid black; border-top: 2px solid black; padding:5px;"><strong>PRESCRIPTION FORM</strong></h4>
       </div>
    </div>


    <div style="width: 100%">
        <div style="width: 50%; float: left;">
               
                <p style="margin-top: -15px;"><strong>Patient Number:</strong> P{{$book['patient']['number']}}</p>
                <p style="margin-top: -15px;"><strong>Name:</strong> {{$book['patient']['first_name']}} {{$book['patient']['middle_name']}} {{$book['patient']['last_name']}} </p>
                <p style="margin-top: -15px;"><strong>Sex:</strong> {{$book['patient']['sex']}} </p>
                <p style="margin-top: -15px;"><strong>Age:</strong> {{$book['patient']['age']}} </p>
                
        </div>

       

        <div style="width: 20%; float: left; margin-left: 0px;">
               

               
        </div>

        <div style="width:30%; float: right;">
            <p style="margin-top: -10px; margin-left: 0px;"><img src="{{public_path('uploads/default.png')}}" style="width: 100px; height: 100px; border: 0px solid black;"></p>
        </div>
    </div>

    <div style="width: 100%; overflow: auto; clear:both; margin-top: 50px;">

            <table class="styled-table">
                <thead>
                    <tr>
                        <th class="text-center" >S/N</th>
                        <th class="text-left">Medicine</th>
                        

                    </tr>
                </thead>
                <tbody>

                    @foreach ($medicines as $key => $medicine)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td >{{$medicine->name}}</td>
                        </tr>
                    @endforeach
                   

                </tbody>
            </table>
    </div>
    <div style=" width: 100%; overflow: auto; clear:both; margin-top: 30px;">
        <div style="width: 20%; float: left; text-align: center;">
            <img src="{{public_path('/uploads/qr-code.png')}}" style="width: 80px; height: 80px;">
        </div>

        <div style="width: 80%; float: right;">
            <p style="font-size: 14px; ">Doctor Name: Dr.  {{$book['book']['first_name']}} {{$book['book']['middle_name']}} {{$book['book']['last_name']}}</p>
            <p style="font-size: 14px; margin-top: -10px;">Doctor Number: D{{$book['book']['number']}} </p>
            <p style="font-size: 14px; margin-top: -10px;">Date Issued: {{$book->updated_at}} </p>
        </div>
    </div>


    <div style=" width: 100%; margin-top: -10px; text-align: center">
        <p style="font-size: 13px; text-align: center">Generated on {{date("l, jS \of F Y ")}} @ {{date("h:i A")}}</p>
    </div>

</div>
</body>
</html>

