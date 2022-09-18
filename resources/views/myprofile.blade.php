@include('web-layout.navigation-bar2')
@include('web-layout.css-link')
<div class="container coin-page">
 
    <div class="row ">
        <div class="col-sm-9 col-lg-3 text-center pimage">
            <img src="http://localhost:8000/storage/{{$user->avatar}}" height="200" width="200" class="detailsimage">
            <br>
            <a onclick="uploadImage()" href='#'>Change Profile Image</a>
            <div>
            <form hidden  id="uploadField" action={{route('uploadpp')}} method="post" enctype="multipart/form-data" style="display:flex; padding:10px">
                @csrf
              <input name="profileImage" type="file" id="form-control">
              <input style="padding-left:10px" type="submit" name="submit" value="Submit" onclick="uploadImage()">
            </form>  
        </div>
        </div>
        <div class="col-sm-9 col-lg-6">
            <h1>{{$user->name}}</h1>
            <h5>Email: {{$user->email}} USD</h5>
            <br>
            <p>You can find a list of your purchased services below</p>
           
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
            <h1><span>$</span>{{$payment->price}}<span>/month</span></h1>
            <p class="text-center">Valid Until : 
                {{$payment->created_at->addHour(720)->format('Y-m-d')}}
            </p>
        </div>
        <div class="sc_body">
        
            <div class="text-center">
            @if ($payment->serviceid ==3 || $payment->serviceid ==1)
            <a href={{route('startPredict')}} class="main-button-slider_2">Use this service</a>
                
            @elseif($payment->serviceid ==2)
            <a href={{route('chatroom')}} class="main-button-slider_2">Use this service</a>

            @endif
                <br><br>
                <a href={{route('delPayment', ['id' => $payment->id])}}>Unsucbscibe</a>
            </div>
        </div>
      </div>
      @endforeach   
    </div>
</div>

<script>
   function uploadImage(){
        
        document.getElementById('uploadField').hidden = !document.getElementById('uploadField').hidden
    }
</script>


@include('web-layout.footer')
@include('web-layout.js-link')




