 <div class="top-bar"> 
    <div class="container">      
          <p>@if (!Auth::guest()){{ Auth::user()->name }} - @endif Welcome to SmartTech center!</p>
      <div class="right-sec">
        <ul>
          @if (Auth::guest())  
          <li><a href="{{ route('srlogin') }}">SM Login</a></li>
          <li><a href="{{ route('srregister') }}">SM Register</a></li>

          <li><a href="{{ route('merchantlogin') }}">Merchant Login</a></li>
          <li><a href="{{ route('merchantregister') }}">Merchant Register</a></li>
          @else
          <li><a href="{{ route('mershipedorderlist') }}">Shiped Order</a></li>
          <li><a href="{{ route('merorderlist') }}">Pending Order</a></li>
          <li><a href="{{ route('merproductlist') }}">Product List</a></li>
          <li><a href="{{ route('productcreate') }}">Create Product</a></li>
          <li><a href="{{ route('brandList') }}">Brand List</a></li>
          <li><a href="{{ route('addBrand') }}">Create Brand</a></li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </li>
          @endif
          
        </ul>
      </div>
    </div>
  </div>