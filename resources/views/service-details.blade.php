@include('web-layout.navigation-bar2')
@include('web-layout.css-link')
<div class="container d-flex justify-content-center service-container" >

<div class="row">
    <div class='col'>
        <div class="row">
            <div class="col d-flex justify-content-center">
            @auth
                <button class="btn btn-danger" onclick="showsection()">
                    Get Service
                </button>
            @else
                <a href='/pleasesignin'> <button class="btn btn-danger">
                        Get Service
                    </button>
                </a>
            @endauth
        </div>
    </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class='col-12 table-responsive' style="overflow-x:auto">
                <form hidden name="payform" class="payform" action="{{ route('pay') }}" method="post">

                    @csrf
                    <table class="table payTable">

                        <tr >
                            <td>
                                <input class="form-control" placeholder="your name"type='text' name='name'>
                            </td>
                            <td>
                                <input class="form-control" type='number' placeholder="card number" name='cardnumber'>
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                <input class="form-control" type='number' name='price' placeholder="amount" value={{ $service->price }}>
                            </td>
                            <td>
                                <input class="form-control" placeholder="expirydate" type='date' name='expirydate'>
                                {{-- <input type="text" class="form-control" name="input" placeholder="Expiry date MM-YY" required 
                                    pattern="(?:19|20)\[0-9\]{2}-(?:(?:0\[1-9\]|1\[0-2\])-(?:0\[1-9\]|1\[0-9\]|2\[0-9\])|(?:(?!02)(?:0\[1-9\]|1\[0-2\])-(?:30))|(?:(?:0\[13578\]|1\[02\])-31))" 
                                    title="Enter a date in this format MM-YY"/> --}}
                            </td>
                          
                        </tr>

                        <tr>
                            <td>
                                <input hidden type='number' name='serviceid' value={{ $service->id }}>
                                <input hidden type='text' name='servicename' value="{{ $service->name }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Pay Now" class="btn btn-success" style="display: block;
                                margin: auto;">
                            </td>
                        </tr>

                    </table>
                    <div class='d-flex justify-content-center'>
                    <img class="paycard"src="assets/images/creditcard.png" heigh="150px" width="300px" />
                  </div>
                </form>
            </div>
        </div>

    
        <div id="cardgreen" class="row card green">
            <div class="additional">
                <div class="user-card">
                    <div class="level center">
                        Level 13
                    </div>
                    <div class="points center">
                        5,312 Points
                    </div>
                    <img class="service-ava"src="http://localhost:8000/storage/{{ $service->image }}" width="100px"
                        height="100px" alt="">
                </div>
                <div class="more-info">
                    <h1>{{ $service->name }}</h1>
                    <div class="coords">
                        <span>Group Name</span>
                        <span>Joined January 2019</span>
                    </div>
                    <div class="coords">
                        <span>Price</span>
                        <span>{{ $service->price }} USD</span>
                    </div>
                    <div class="stats">
                        <div>
                            <div class="title">WinTrades</div>
                            <i class="fa fa-trophy"></i>
                            <div class="value">30</div>
                        </div>

                        <div>
                            <div class="title">Subscribers</div>
                            <i class="fa fa-group"></i>
                            <div class="value">123</div>
                        </div>
                        <div>
                            <div class="title">Support</div>
                            <i class="fa fa-phone"></i>
                            <div class="value infinity">∞</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="general">
                <h1>{{ $service->name }}</h1>
                <p>{{ $service->description }}</p>
                <p>{{ $service->price }} USD</p>
                <span class="more">Mouse over the card for more info</span>
            </div>
        </div>
    
    </div>
    </div>
    <div class="row">
   
    </div>
</div>




@include('web-layout.footer')
@include('web-layout.js-link')

