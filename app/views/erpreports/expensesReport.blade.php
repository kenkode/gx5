
<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>
<html >

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">

table {
  max-width: 100%;
  background-color: transparent;
}

th {
  text-align: left;
}
.table {
  width: 100%;
   margin-bottom: 150px;
}
hr {
  margin-top: 1px;
  margin-bottom: 2px;
  border: 0;
  border-top: 2px dotted #eee;
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  line-height: 1.428571429;
  color: #333;
  background-color: #fff;


 @page { margin: 50px 30px; }
 .header { position: top; left: 0px; top: -150px; right: 0px; height: 100px;  text-align: center; }
 /* .content {margin-top: -100px; margin-bottom: -150px} */
 .footer { position: fixed; left: 0px; bottom: -60px; right: 0px; height: 50px;  }
 .footer .page:after { content: counter(page, upper-roman); }


      img.watermark{
        position: fixed;
        width: 100%;
        z-index: 10;
        opacity: 0.1;
      }


    </style>
  
  </head>


  <body>
  <!-- <img src="{{ asset('public/uploads/logo/ADmzyppq2eza.png') }}" class="watermark"> -->
  <div class="header">
       <table >

      <tr>


       
        <td style="width:150px">

            <img src="{{asset('public/uploads/logo/'.$organization->logo)}}" alt="logo" width="50%">
    
        </td>

        <td>
        <strong>
          {{ strtoupper($organization->name)}}
          </strong><br><p>
          {{ $organization->phone}}<br><p> 
          {{ $organization->email}}<br><p> 
          {{ $organization->website}}<br><p>
          {{ $organization->address}}
       

        </td>
        

      </tr>


      <tr>

        <hr>
      </tr>



    </table>
   </div>



<div class="footer">
     <p class="page">Page <?php $PAGE_NUM; ?></p>
   </div>

 <br><br>
  <div class="content" style='margin-top:0px;'>
   <!-- <div align="center"><strong>Expenditure Report as at {{date('d-M-Y')}}</strong></div><br> -->
   <div align="center"><strong>Expense Report as from:  {{$from}} To:  {{$to}}</strong></div><br>



    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
        


        <th width='20'><strong># </strong></th>
        <th><strong>Date</strong></th>
        <th><strong>Name </strong></th>        
        <th><strong>Type</strong></th>
        <th><strong>Amount</strong></th>
        <!-- <th><strong>account </strong></th> -->
        
      </tr>
      <?php $i =1; $total=0;?>
      
      @foreach($expenses as $expense)
      <tr>
         

       <td td width='20' valign="top">{{$i}}</td>
        <td> {{ $expense->date }}</td>
        <td> {{ $expense->name }}</td>        
        <td> {{ $expense->type }}</td>
        <td align="right"> {{ asMoney($expense->amount) }}</td>     
        </tr>
      <?php $i++; $total=$total + $expense['amount'];?>
   
    @endforeach

  
    <tr>
    <td colspan="3"></td>
    
    
    
    
      <td><b>Total Expense: </td><td align="right"></b><b> {{asMoney($total)}}</b></td></tr>
   <tr>
          <td colspan="3"></td>
            <td><strong>Cumulative Expenses :</strong></td>
            <td align = "right"><strong>{{asMoney($total_expenses_todate)}}</strong></td>
        </tr>

         <tr>
          <td colspan="3"></td>
            <td><strong>Cumulative Net Profit :</strong></td>
            <td align = "right"><strong>{{asMoney($total_sales_todate->total_sales - $total_sales_todate->total_dicount - $total_sales_todate->total_purchase - $total_expenses_todate)}}</strong></td>
        </tr>
</table>
<br><br>

   
</div>


</body>

</html>



