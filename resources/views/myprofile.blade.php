@include('web-layout.navigation-bar2')
@include('web-layout.css-link')
<div class="container coin-page">
 
    <div class="row ">
        <div class="col-sm-9 col-lg-3">
            <img src="http://localhost:8000/storage/{{$user->avatar}}" height="200" width="200" class="detailsimage">
        </div>
        <div class="col-sm-9 col-lg-6">
            <h1>{{$user->name}}</h1>
            <h5>Email: {{$user->email}} USD</h5>
            
            <br>
            <p>You can find a list of your purchased services in the table below</p>
           
        </div>
    </div>
<div class="row">
    @foreach($user->payments as $payment)
    
      <div class="col-xs-12 col-sm-9 col-md-5 col-lg-3 card s_card">
        <div class="sc_head">
            <div class="text-center sc_name">
              <h4>{{$payment->servicename}}</h4>
            </div>
            <br>
            <h1>{{$payment->price}} $</h1>
            <p class="text-center">Valid Until : 
                {{$payment->created_at->addHour(720)->format('Y-m-d')}}
            </p>
        </div>
        <div class="sc_body">
        
            <div class="text-center">
                <a href={{route('startPredict')}} class="main-button-slider">Predict Now</a>
                <br><br>
                <a href={{route('delPayment')}}>Unsucbscibe</a>
            </div>
        </div>
      </div>
      @endforeach 
    
      
    </div>
     
    {{-- <div class="row mt-3 mypaments">
        <div class="col-9">
        <table class="ptable" border="2"}>
            
                <th>
                    <td><strong>Service Name</strong></td>
                    <td><strong>Price</strong></td>
                    <td><strong>Card Number</strong></td>
                    <td><strong>Created at</strong></td>
                </th>
            
            @foreach($user->payments as $payment)
            <tr>
                <td></td>
                <td>{{$payment->servicename}}</td>
                <td>{{$payment->price}} $</td>
                <td>{{$payment->cardnumber}}</td>
                <td>{{$payment->created_at}}</td> 
            </tr>
            @endforeach 
        </table>        
    </div>
    </div> --}}
</div>


@include('web-layout.footer')
@include('web-layout.js-link')




