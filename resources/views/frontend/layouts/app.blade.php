<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', app_name())">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            @if(env('APP_ENV')=='production')
                {{ Html::style(getRtlCss(mix('css/frontend.css')), array(), true) }}
            @else
                {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
            @endif 
            
        @else
            @if(env('APP_ENV')=='production')
                {{ Html::style(mix('css/frontend.css'), array(), true) }}
            @else
                {{ Html::style(mix('css/frontend.css')) }}
            @endif
        @endif
        
    

        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body id="app-layout">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!--#app-->

        <!-- Scripts -->
        @yield('before-scripts')
            @if(env('APP_ENV')=='production')
                {!! Html::script(mix('js/frontend.js'), array(), true) !!}
            @else
                {!! Html::script(mix('js/frontend.js')) !!}
            @endif
        @yield('after-scripts')

        @include('includes.partials.ga')
    </body>
    @if (Route::current()->getName() == 'frontend.user.dashboard')
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/keytable/2.3.2/css/keyTable.dataTables.css">
        
        
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
        <script src="//cdn.datatables.net/keytable/2.3.2/js/dataTables.keyTable.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    @if(env('APP_ENV')=='production')
                        ajax: "{{ config('app.url') }}/anyData",
                    @else
                        ajax: "{{ config('app.url') }}/anyData",
                    @endif
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'email', name: 'email' },
                        { data: 'updated_at', name: 'updated_at' }
                    ],
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = document.createElement("input");
                            $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                        });
                    }
                });
                new $.fn.dataTable.KeyTable( table );
                
                setInterval( function () {
                    table.ajax.reload();
                }, 10000 ); //10sec
            });
        </script>
    @endif
    
    @if (Route::current()->getName() == 'frontend.user.account')
        <script>
            $( "#OTPQR" ).click(function() {
                $.ajax({
                  url: "/2fa/render",
                  success: function( response ) {
                      // $("#QR").attr("src", response['image']);
                      document.getElementById("qr").innerHTML = '<img src="' + response['image'] + '">';
                      document.getElementById("code").innerHTML = response['secret'];
                  }
                });
            });
        </script>
    @endif
</html>