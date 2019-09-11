<nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">

              <ul>
                
                  <li><a href="#."> TV & Video</a></li>
                  <li><a href="#."> Camera, Photo & Video</a></li>
                  <li class="sub-menu"><a href="#."> Cell Phones & Accessories</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li><a href="#."> Headphones</a></li>
                  <li><a href="#."> Video Games</a></li>
                  <li class="sub-menu"><a href="#."> Bluetooth & Wireless Speakers</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li class="sub-menu"><a href="#."> Gaming Console</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>
                  </li>
                  <li><a href="#."> Computers & Tablets</a></li>
                  <li><a href="#."> Monitors</a></li>
                  <li><a href="#."> Home Appliances</a></li>
                  <li><a href="#."> Office Supplies</a></li>
                </ul>
            </div>
          </div>
        </div>
        
        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
            <li class="dropdown megamenu active"> <a href="{{ route('welcome') }}" class="dropdown-toggle" data-toggle="dropdown">Home </a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside scrn">
                  <ul class="home-links">
                    <li><a href="{{ route('welcome') }}"><img class="img-responsive" src="images/home-1.jpg" alt="" > <span>Home Version 1</span></a></li>
                    <li><a href="{{ route('welcome') }}"><img class="img-responsive" src="images/home-2.jpg" alt="" > <span>Home Version 2</span></a> </li>
                    <li><a href="{{ route('welcome') }}"><img class="img-responsive" src="images/home-3.jpg" alt="" > <span>Home Version 3</span></a></li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="About.html"> About </a></li>
                <li><a href="LoginForm.html"> Login Form </a></li>
                <li><a href="GridProducts_3Columns.html"> Products 3 Columns </a></li>
                <li><a href="GridProducts_4Columns.html"> Products 4 Columns </a></li>
                <li><a href="ListProducts.html"> List Products </a></li>
                <li><a href="Product-Details.html"> Product Details </a></li>
                @if (!(Auth::guest()))
                <li><a href="ShoppingCart.html"> Shopping Cart</a></li>
                <li><a href=""> Payment Methods </a></li>                
                @endif
                <li><a href="DeliveryMethods.html"> Delivery Methods</a></li>
                <li><a href="Confirmation.html"> Confirmation </a></li>
                <li><a href="CheckoutSuccessful.html"> Checkout Successful </a></li>
                <li><a href="Error404.html"> Error404 </a></li>
                <li><a href="contact.html"> Contact </a></li>
                <li class="dropdown-submenu"><a href="#."> Dropdown Level </a>
                  <ul class="dropdown-menu animated-2s fadeInRight">
                    <li><a href="#.">Level 1</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <!-- Mega Menu Nav -->
            <li class="dropdown megamenu"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Mega menu </a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside">
                  <div class="top-lins">
                    <ul>
                      <li><a href="#."> Cell Phones & Accessories </a></li>
                      <li><a href="#."> Carrier Phones </a></li>
                      <li><a href="#."> Unlocked Phones </a></li>
                      <li><a href="#."> Prime Exclusive Phones </a></li>
                      <li><a href="#."> Accessories </a></li>
                      <li><a href="#."> Cases </a></li>
                      <li><a href="#."> Best Sellers </a></li>
                      <li><a href="#."> Deals </a></li>
                      <li><a href="#."> All Electronics </a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6>Electronics</h6>
                      <ul>
                        <li><a href="#."> Cell Phones & Accessories </a></li>
                        <li><a href="#."> Carrier Phones </a></li>
                        <li><a href="#."> Unlocked Phones </a></li>
                        <li><a href="#."> Prime Exclusive Phones </a></li>
                        <li><a href="#."> Accessories </a></li>
                        <li><a href="#."> Cases </a></li>
                        <li><a href="#."> Best Sellers </a></li>
                        <li><a href="#."> Deals </a></li>
                        <li><a href="#."> All Electronics </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6>Computers</h6>
                      <ul>
                        <li><a href="#."> Computers & Tablets</a></li>
                        <li><a href="#."> Monitors</a></li>
                        <li><a href="#."> Laptops & tablets</a></li>
                        <li><a href="#."> Networking</a></li>
                        <li><a href="#."> Drives & Storage</a></li>
                        <li><a href="#."> Computer Parts & Components</a></li>
                        <li><a href="#."> Printers & Ink</a></li>
                        <li><a href="#."> Office & School Supplies </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-2">
                      <h6>Home Appliances</h6>
                      <ul>
                        <li><a href="#."> Refrigerators</a></li>
                        <li><a href="#."> Wall Ovens</a></li>
                        <li><a href="#."> Cooktops & Hoods</a></li>
                        <li><a href="#."> Microwaves</a></li>
                        <li><a href="#."> Dishwashers</a></li>
                        <li><a href="#."> Washers</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-4"> <img class=" nav-img" src="images/navi-img.png" alt="" > </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown"> <a href="blog.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="Blog.html">Blog </a></li>
                <li><a href="Blog_details.html">Blog Single </a></li>
              </ul>
            </li>
            <li> <a href="shop.html">Buy theme! </a></li>
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong> (+100) 123 456 7890</span> </div>
      </div>
    </nav>