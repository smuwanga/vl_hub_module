<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Printing of patient results')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')

        {{ Html::style(elixir('css/frontend.css')) }}
        {{ Html::style('https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css') }}
        
        <link rel="stylesheet" type="text/css" href="{{asset('css/patient_results.css')}}"/>    

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        @langRTL
            {!! Html::style(elixir('css/rtl.css')) !!}
        @endif

        @yield('after-styles-end')

        <!-- Fonts -->
        {{ Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') }}
                {{ HTML::script('http://code.jquery.com/jquery-1.11.3.js') }}
                {{ HTML::script('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js') }}
                {{ HTML::script('https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js') }}
                {{ HTML::script('http://code.jquery.com/ui/1.11.3/jquery-ui.js') }}
     <script type="text/javascript">
        function myFunction() {
            window.print();
        }
     </script>
        
    </head>
    <body id="app-layout">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        <div class="container">
            @include('includes.partials.messages')
            @yield('content')
        </div><!-- container -->

        <!-- Scripts -->
        <!--
        {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
       -->
        {!! Html::script('js/vendor/bootstrap/bootstrap.min.js') !!}

        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
</html>