<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>
         <a href="" class="btn btn-danger btn-block"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
         >Logout</a>
         <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
         </form>

     <hr>
    </div>
  </aside>
  <!-- /.control-sidebar -->
