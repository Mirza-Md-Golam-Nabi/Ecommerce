@if (Auth::guest())
<div class="container">
      <div class="logo"> <a href="index.html"><img src="images/logo.png" alt="" ></a> </div>
       
      <div class="search-cate">
        <select class="selectpicker">
          <option> All Categories</option>
          <option> Home Audio & Theater</option>
          <option> TV & Video</option>
          <option> Camera, Photo & Video</option>
          <option> Cell Phones & Accessories</option>
          <option> Headphones</option>
          <option> Video Games</option>
          <option> Bluetooth & Wireless </option>
          <option> Gaming Console</option>
          <option> Computers & Tablets</option>
          <option> Monitors </option>
        </select>
        <input type="search" placeholder="Search entire store here...">
        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
      </div>
      
      <!-- Cart Part -->
      <ul class="nav navbar-right cart-pop">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
          <span>3 item(s) - $500.00</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="media-left"> <a href="#." class="thumb"> <img src="images/item-img-1-1.jpg" class="img-responsive" alt="" > </a> </div>
              <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x 1</span> </div>
            </li>
            <li>
              <div class="media-left"> <a href="#." class="thumb"> <img src="images/item-img-1-2.jpg" class="img-responsive" alt="" > </a> </div>
              <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x 1</span> </div>
            </li>
            <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
          </ul>
        </li>
      </ul>
     
    </div> 
@endif