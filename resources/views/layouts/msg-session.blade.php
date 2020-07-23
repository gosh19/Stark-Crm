<div id="msg-session" class="alert-info w-100 p-3" style="z-index: 2;">
    <p>{{session('msg')}}</p>
</div>

<script>
    setTimeout(function() {
        $('#msg-session').fadeOut('slow');
    }, 1500);
    
</script>