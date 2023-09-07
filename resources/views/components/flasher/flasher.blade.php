@if (session('type') == 'sweetalert')
    @if (session('case') == 'default')
    <script>
        Swal.fire({
            position: `{{ session('position') }}`,
            icon: `{{ session('type') }}`,
            title: `{{ session('message') }}`,
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
@elseif (session('type') == 'toaster')
    <div id="toaster"></div>
@elseif (session('type') == 'bootstrap')
    
@endif