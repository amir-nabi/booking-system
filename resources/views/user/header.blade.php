<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}"><strong>Fairfield</strong> medicalCenter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('expertises.home') }}">Departments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('doctors.home') }}">Doctors</a>
          </li>
      </ul>
    </div>
  </nav>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-50 dark:bg-gray-700 sm:items-center py-4 sm:pt-0">
  @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-black-700 dark:text-black-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-black-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
                @endif