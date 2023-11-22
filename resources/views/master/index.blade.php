@extends('layouts.master')

@section('page-title', 'Master Mobil')

@section('breadcrumbs')
    <li class="breadcrumb-item">Master Mobil</li>
    <li class="breadcrumb-item active">Semua Harga Mobil</li>
@endsection

@section('style_css')
    <style>
        .table-responsive {
            font-size: .8em !important;
        }

        div.dataTables_processing {
            z-index: 1;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">SEMUA MOBIL</h5>
                        </div>
                        <div class="col-6">
                            <div class="right float-end">
                                <button type="button" class="btn btn-outline-primary" style="margin-top: 12px;"
                                    data-bs-toggle="modal" data-bs-target="#basicModal">
                                    <i class="bi bi-plus" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Tambah"></i> Tambah Mobil
                                </button>
                            </div>
                            <!-- Basic Modal -->
                        </div>
                    </div>
                    <!-- Table with hoverable rows -->
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NO
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">
                                                MEREK MOBIL
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">
                                                MODEL MOBIL
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">
                                                PLAT MOBIL
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ">
                                                TARIF SEWA MOBIL
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($mobil as $b)
                                            <tr>
                                                <td class="ps-4">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $no++ }}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->merek_mobil }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->modal_mobil }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->plat_mobil }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->stock_mobil }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->tarif_sewa }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $b->jenis_mobil }}
                                                    </p>
                                                </td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-outline-warning"><i
                                                            class="bi bi-pencil-square" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit"></i></a>

                                                    <a href="#" class="btn btn-outline-danger delete"
                                                        book-id="{{ $b->id }}" book_name="{{ $b->nama_satuan }}"><i
                                                            class="bi bi-trash" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </table> <!-- End Table with hoverable rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sewa Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- General Form Elements -->


                        <form action="{{ route('mobil.store') }}" method="POST" class="row">
                            {{ csrf_field() }}

                            {{-- Tanggal Masuk --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('merek_mobil') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Merek Mobil</label>
                                <div>
                                    <input name="merek_mobil" type="text" id="merek_mobil" class="form-control"
                                        value="{{ old('merek_mobil') }}" placeholder="Merek Mobil" required>
                                    @if ($errors->has('merek_mobil'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('merek_mobil') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3{{ $errors->has('model_mobil') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Model Mobil</label>
                                <div>
                                    <input name="model_mobil" type="text" id="model_mobil" class="form-control"
                                        value="{{ old('model_mobil') }}" placeholder="Model Mobil" required>
                                    @if ($errors->has('model_mobil'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('model_mobil') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3{{ $errors->has('plat_mobil') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Plat Mobil</label>
                                <div>
                                    <input name="plat_mobil" type="text" id="plat_mobil" class="form-control"
                                        value="{{ old('plat_mobil') }}" placeholder="Plat Mobil" required>
                                    @if ($errors->has('plat_mobil'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('plat_mobil') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3{{ $errors->has('stock_mobil') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Stock Mobil</label>
                                <div>
                                    <input name="stock_mobil" type="text" id="stock_mobil" class="form-control"
                                        value="{{ old('stock_mobil') }}" placeholder="Stock Mobil" required>
                                    @if ($errors->has('stock_mobil'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('stock_mobil') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3{{ $errors->has('tarif_sewa') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Tarif Sewa</label>
                                <div>
                                    <input name="tarif_sewa" type="text" id="tarif_sewa" class="form-control"
                                        value="{{ old('tarif_sewa') }}" placeholder="Trif Sewa" required>
                                    @if ($errors->has('tarif_sewa'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('tarif_sewa') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3{{ $errors->has('jenis_mobil') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Jenis Mobil</label>
                                <div>
                                    <input name="jenis_mobil" type="text" id="jenis_mobil" class="form-control"
                                        value="{{ old('jenis_mobil') }}" placeholder="Jenis Mobil" required>
                                    @if ($errors->has('jenis_mobil'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('jenis_mobil') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="container">
                                <div class="row col-sm-12 mb-5 justify-content-start">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="submit" class="btn btn-outline-success"
                                            style="margin-top: 12px;">Save</button>
                                        <a href="/dashboard" type="button" class="btn btn-outline-info"
                                            style="margin-top: 12px;">
                                            Home
                                        </a>
                                        <a href="/satuan" type="button" class="btn btn-outline-warning"
                                            style="margin-top: 12px;">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sweetalert')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('body').on('click', '.delete', function() {
                var book_id = $(this).attr('book-id');
                var book_name = $(this).attr('book_name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you want to delete " + book_name + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/satuan/" + book_id,
                            type: "POST",
                            data: {
                                _method: "DELETE",
                            },
                            success: function() {
                                swal.fire({
                                    title: 'Hore 😀 !!',
                                    text: 'You clicked the button!',
                                    icon: 'success'
                                }).then((result) => {
                                    location.reload();
                                })
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Thank you not delete me 😭 !!',
                            'Your Item Files are safe ',
                            'error'
                        )
                    }
                })
            });
        });

        @if (session()->has('sukses'))
            const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session()->pull('sukses') }}"
            });
        @elseif (session()->has('danger'))
            const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session()->pull('danger') }}"
            });
        @elseif (session()->has('info'))
            const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session()->pull('danger') }}"
            });
        @endif
    </script>
@endsection
