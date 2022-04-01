@php 
$prefix = Request::route()->getprefix();
$route  = Route::current()->getName();
@endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       @if(Auth::user()->role=='Admin')
          <li class="nav-item has-treeview {{($prefix=='users')?'menu open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{($route=='user.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
             
            </ul>
          </li>
     @endif
          <li class="nav-item {{($prefix=='profiles')?'menu open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('profiles.passowrd.view')}}" class="nav-link  {{($route=='profiles.passowrd.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Logo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logos.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Logo</p>
                </a>
              </li>
             
            </ul>
          </li>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
             
            </ul>
          </li>


      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contacts.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
          </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('communicate')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Communicate</p>
                </a>
              </li>
             
            </ul>
        </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Abouts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('abouts.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Abouts</p>
                </a>
              </li>
             
            </ul>
          </li>

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categorys.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
             
            </ul>
          </li>

         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Manage brand
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View brand</p>
                </a>
              </li>
          </ul>
        </li>
        
     <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             Manage Color
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('colors.view')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Color</p>
              </a>
            </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
           Manage Size
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('sizes.view')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View Size</p>
            </a>
          </li>
      </ul>
    </li>
  
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
         Manage Product
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('products.view')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Product</p>
          </a>
        </li>
    </ul>
  </li>

  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-copy"></i>
      <p>
       Manage Customer
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('customers.view')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>View Customer</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('customers.draft.view')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>View Draft</p>
        </a>
      </li>
  </ul>
</li>


<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
     Manage Oders
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{route('orders.pending.list')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Pending Orders</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('orders.appdoved.list')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Approved Oders</p>
      </a>
    </li>
 </ul>
</li>
</nav>
      <!-- /.sidebar-menu --> 