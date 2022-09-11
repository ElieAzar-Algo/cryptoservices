@include('web-layout.special-css-link')
<div>

    <h5 hidden id="wait_message" class="predict_title">OUR AI BOT IS PROCESSING THE PREDICTED PRICES<br>
        PLEASE WAIT... <br> </h5>

    <h5 id="predict_title" class="predict_title">OUR PREDICTION ABOUT BITCOIN'S PRICE AT<br>
        {{ now(+3)->addHour(1)->format('Y-m-d H:i:s') }} is <br> </h5>

    @if ($output)
        <h1 class="predict_number">{{ $output }} </h1>
       
    @else
        <h1 class="calculate">
            ***** <br>
            <a id="clickhere" onclick="loading()" href={{ route('predict') }}>Click Here to Calculate</a>
        </h1>
    @endif
    <div class="predict_unit">
    <h5 >USD/BTC</h5>
    <a id="back" href={{route("home")}}> Back Home </a>
   
</div>
</div>


<div hidden class="preloader" id="preloader">
    <div class="wrapper">
        <div class="pyramid">
            <div class="square">
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
            </div>
        </div>

        <div class="pyramid inverse">
            <div class="square">
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
            </div>
        </div>
    </div>

</div>
<script>
    function loading() {
        document.getElementById('preloader').hidden = false
        document.getElementById('clickhere').hidden = true
        document.getElementById('back').hidden = true
        document.getElementById('predict_title').hidden = true
        document.getElementById('wait_message').hidden = false
    }
</script>
