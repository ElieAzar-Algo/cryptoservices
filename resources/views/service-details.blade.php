

@include('web-layout.navigation-bar')
@include('web-layout.css-link')

<div class="center">

 <div class="service-conten">
  
    <div class="card green">
      <div class="additional">
        <div class="user-card">
          <div class="level center">
            Level 13
          </div>
          <div class="points center">
            5,312 Points
          </div>
          <img class="service-ava"src="http://localhost:8000/storage/{{$service->image}}"  width="100px" height="100px" alt="">
        </div>
        <div class="more-info">
          <h1>{{$service->name}}</h1>
          <div class="coords">
            <span>Group Name</span>
            <span>Joined January 2019</span>
          </div>
          <div class="coords">
            <span>Position/Role</span>
            <span>City, Country</span>
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
        <h1>Jane Doe</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a volutpat mauris, at molestie lacus. Nam vestibulum sodales odio ut pulvinar.</p>
        <span class="more">Mouse over the card for more info</span>
      </div>
    </div>
  
  </div>
</div>

@include('web-layout.footer')

@include('web-layout.js-link')