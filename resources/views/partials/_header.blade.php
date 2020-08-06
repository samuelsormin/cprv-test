<header>
  <a href="."><h2>Simple App!</h2></a>
  <nav>
    <a id="report-menu" href="{{ route('report') }}">Report</a>

    @auth
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
      </a>
    @endauth

    @guest
      <a id="report-menu" href="{{ route('login') }}">Login</a>
    @endguest
  </nav>
  <a id="xs-menu" href="#" class="xs-menu"><i class="ti-menu"></i></a>
</header>
<div class="xs-nav">
  <a id="xs-report-menu" href="{{ route('report') }}">Report</a>
  
  @auth
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  @endauth

  @guest
    <a id="report-menu" href="{{ route('login') }}">Login</a>
  @endguest

</div>

@push('scripts')
  <script>
    $(document).ready(function(){
      $('#xs-menu').click(function() {
        $('.xs-nav').slideToggle(500);
      });
    });
  </script>
@endpush