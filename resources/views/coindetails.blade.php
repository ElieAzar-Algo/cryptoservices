@include('web-layout.navigation-bar2')
@include('web-layout.css-link')
<div class="container coin-page">
 
    <div class="row ">
        <div class="col-4">
            {{-- <img src="http://localhost:8000/storage/{{$coin->image}}"> --}}
            <img src="http://localhost:8000/storage/{{$coin->image}}" height="300" width="300" class="coinimage">

        </div>
        <div class="col-8">
            <h1>{{$coin->name}}</h1>
            <h5>{{$coin->value}} USD</h5>
            <br>
            <p>A cryptocurrency, crypto-currency, crypto, or coin is a digital currency designed to work as a medium of exchange through a computer network that is not reliant on any central authority, such as a government or bank, to uphold or maintain it.</p>
           
        </div>
    </div>
    <div class="row mt-5">
        @foreach($services as $service)
        <div class="col-3 card service-card">
            <a href='{{route('service',"id=$service->id")}}' style="color: inherit; text-decoration: inherit;">
            <div class="coin-service">
                <h4>{{$service->name}}</h4>
                <p>{{$service->description}}</p>
                <h5>{{$service->price}} USD</h5>
                <img class="coin-service-image" src="http://localhost:8000/storage/{{$service->image}}" height="90px" width="90px"/>
            </div>
        </a>
        </div>
        @endforeach 
    </div>
</div>


@include('web-layout.footer')
@include('web-layout.js-link')