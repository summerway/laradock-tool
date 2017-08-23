<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/backtoup.js') !!}

<script>
    //global
    var csrf_token = '{!! csrf_token() !!}'
    var base_path = '{!! \Request::root() !!}'
</script>