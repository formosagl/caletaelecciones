    <footer class="footer py-5">
    <div class="container">
      @if (!auth()->user() || \Request::is('static-sign-up')) 
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> 
              <a style="color: #252f40;" href="https://www.josemanuelgon.com" class="font-weight-bold ml-1" target="_blank">JMG</a>
            </p>
          </div>
        </div>
      @endif
    </div>
  </footer>

