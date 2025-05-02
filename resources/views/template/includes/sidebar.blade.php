<nav class="sidebar sidebar-offcanvas border-end border-black" id="sidebar">
  <ul class="nav">
      <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
              <div class="nav-profile-image">
                  <img class="border border-black rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2 text-black">{{ Auth::user()->name }}</span>
                  <span class="text-secondary text-small">{{ Auth::user()->role }}</span>
              </div>
              <i class="mdi mdi-bookmark-check text-info nav-profile-badge"></i>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.dashboard')}}">
              <span class="menu-title text-black">Dashboard</span>
              <i class="mdi mdi-home menu-icon text-black"></i>
          </a>
      </li>

      <!-- category -->
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title text-black">Category</span>
              <i class="menu-arrow text-black"></i>
          </a>
          <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('category') }}">List Category</a>
                  </li>
              </ul>
          </div>
      </li>

      <!-- Siswa -->
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#student" aria-expanded="false" aria-controls="student">
              <span class="menu-title text-black">Siswa</span>
              <i class="menu-arrow text-black"></i>
          </a>
          <div class="collapse" id="student">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link text-black" href="#">Daftar Siswa</a>
                  </li>
              </ul>
          </div>
      </li>
      <!-- Book -->
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#book" aria-expanded="false" aria-controls="book">
              <span class="menu-title text-black">Buku</span>
              <i class="menu-arrow text-black"></i>
          </a>
          <div class="collapse" id="book">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('book') }}">List Buku</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('book.create') }}">Tambah Buku</a>
                  </li>
              </ul>
          </div>
      </li>
      <!-- borrowing -->
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#borrowing" aria-expanded="false" aria-controls="borrowing">
              <span class="menu-title text-black">Peminjaman</span>
              <i class="menu-arrow text-black"></i>
          </a>
          <div class="collapse" id="borrowing">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('borrowing.unreturned') }}">Peminjam Aktif</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('borrowing.returned') }}">Dikembalikan</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-black" href="{{ route('borrowing.all') }}">Semua Peminjaman</a>
                  </li>
              </ul>
          </div>
      </li>
  </ul>
</nav>