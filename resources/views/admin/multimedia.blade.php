@extends('layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@endpush

@section("content")
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Siswa Multimedia</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Multimedia</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

    <livewire:multi-media></livewire:multi-media>
    <livewire:multimedia.data-hadir-multimedia>
    <livewire:multimedia.data-sakit-multimedia>
    <livewire:multimedia.data-izin-multimedia>
    <livewire:multimedia.data-alfa-multimedia>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

{{-- swithalert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ==============================================================================
    window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to delete this user's data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteCorfirmed')
        }
        })
    });

    window.addEventListener('userDeleted', event => {
        Swal.fire(
            'Deleted!',
            'This user has been deleted.',
            'success'
        )
    });
    // ==============================================================================


    // ==============================================================================
    window.addEventListener('messageUpdate', event => {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Data Change successfully'
        })
    });
    // ==============================================================================


    // ==============================================================================
    window.addEventListener('delete-total-hadir-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to completely delete attendance!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('totalHadirCorfirmed')
        }
        })
    });

    window.addEventListener('hadirDelete', event => {
        Swal.fire(
            'Deleted!',
            'Total attendance has been successfully deleted.',
            'success'
        )
    });


    window.addEventListener('delete-total-sakit-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "want to delete all sick data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('totalSakitCorfirmed')
        }
        })
    });

    window.addEventListener('sakitDelete', event => {
        Swal.fire(
            'Deleted!',
            'Total pain successfully removed.',
            'success'
        )
    });


    window.addEventListener('delete-total-izin-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "want to delete all permission data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('totalIzinCorfirmed')
        }
        })
    });

    window.addEventListener('izinDelete', event => {
        Swal.fire(
            'Deleted!',
            'Total permissions deleted successfully.',
            'success'
        )
    });


    window.addEventListener('delete-total-alfa-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "want to delete all permission data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('totalAlfaCorfirmed')
        }
        })
    });

    window.addEventListener('alfaDelete', event => {
        Swal.fire(
            'Deleted!',
            'Total permissions deleted successfully.',
            'success'
        )
    });


    //  delete custon hadir
    window.addEventListener('delete-hadir-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to delete attendance data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteHadirCorfirmed')
        }
        })
    });

    window.addEventListener('deleteHadirSuccess', event => {
        Swal.fire(
            'Deleted!',
            'Data deleted successfully.',
            'success'
        )
    });

    // delete custom sakit
    window.addEventListener('delete-custom-sakit-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to delete this sick data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteCustomSakitCorfirmed')
        }
        })
    });

    window.addEventListener('deleteCustomSakitSuccess', event => {
        Swal.fire(
            'Deleted!',
            'Data deleted successfully.',
            'success'
        )
    });


    // delete custom izin
    window.addEventListener('delete-custom-izin-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to delete this permission data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteCustomIzinCorfirmed')
        }
        })
    });

    window.addEventListener('deleteCustomIzinSuccess', event => {
        Swal.fire(
            'Deleted!',
            'Data deleted successfully.',
            'success'
        )
    });


    // delete custom alfa
    window.addEventListener('delete-custom-alfa-confirmation', event => {
        Swal.fire({
        title: 'Are you sure?',
        text: "Want to delete absent data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete!'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('deleteCustomAlfaCorfirmed')
        }
        })
    });

    window.addEventListener('deleteCustomAlfaSuccess', event => {
        Swal.fire(
            'Deleted!',
            'Data deleted successfully.',
            'success'
        )
    });
    // ==============================================================================


</script>
@endpush

