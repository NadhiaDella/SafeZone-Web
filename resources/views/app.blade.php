<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
  <script src="https://unpkg.com/scrollreveal"></script>
  <title>SafeZone</title>
</head>

<body>

  <!-- header start -->
  @include('components.header')
  <!-- header end -->

  @if(session('status'))
      <script>
          document.addEventListener('DOMContentLoaded', function() {
              showToast('{{ session('status') }}');
          });
      </script>
  @endif

  @yield('content')
    

  <section class="footer">
    @include('components.footer')
  </section>

  <script src="{{asset('js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>