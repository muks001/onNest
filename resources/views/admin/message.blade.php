@if(session('success'))
<div class="custom-alert-msg alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="custom-alert-msg alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if(session('alert-success'))
@section('sweet-alert')
<script>
    $( document ).ready(function() {
        swal("Deleted!", "{{ session('alert-success') }}", "success");
});
   
</script>    
@endsection

    

@endif