<div id="msg-session" class="alert-info w-100 p-3">
    <p>{{session('msg')}}</p>
</div>

<script>
    setTimeout(function() {
        $('#msg-session').fadeOut('slow');
    }, 2000);
    
</script>