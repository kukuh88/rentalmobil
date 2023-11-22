@extends('layouts.master')

@section('page-title', 'Edit Mobil')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="/mobil">Manajemen Mobil</a></li>
    <li class="breadcrumb-item"><a href="/master">Maseter</a></li>
    <li class="breadcrumb-item">Edit Master
    </li>
@endsection

@section('style_css')
    <style>
        .table-responsive {
            font-size: .8em !important;
        }

        div.dataTables_processing {
            z-index: 1;
        }

        .img-priview {
            width: 100%;
            max-width: 300px;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Edit</h5>
                            </div>
                            <div class="col-6">
                                <div class="right float-end">
                                    <a href="/mobil" type="button" class="btn btn-outline-primary"
                                        style="margin-top: 12px;">
                                        Back
                                    </a>
                                </div>
                                <!-- Basic Modal -->
                            </div>
                        </div>

                        <form action="{{ route('mobil.update', $master) }}" method="POST" enctype="multipart/form-data"
                            class="row" id="form-update" onsubmit="submitAjax(event)">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-start">
                                            <div class="col-6 mb-3">

                                                {{-- bagian form sebelah kiri --}}
                                                <div class="row mb-3">
                                                    <label for="text" class="col-sm-4 col-form-label">Merek
                                                        Mobil</label>
                                                    <div class="col-sm-8 mt-3">
                                                        <input name="merek_mobil" type="text" class="form-control"
                                                            placeholder="Merek Mobil" value="{{ $master->merek_mobil }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="text" class="col-sm-4 col-form-label">Model
                                                        Mobil</label>
                                                    <div class="col-sm-8">
                                                        <input name="model_mobil" type="text" class="form-control"
                                                            placeholder="model_mobil"
                                                            value="{{ $master->model_mobil }}"required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="text" class="col-sm-4 col-form-label">Plat Mobil</label>
                                                    <div class="col-sm-8">
                                                        <input name="plat_mobil" type="text" class="form-control"
                                                            placeholder="plat_mobil" value="{{ $master->plat_mobil }}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                  
                                    <div class="row col-md-11">
                                        <div class="col-sm-9">
                                            <label class="col-sm-3 col-form-label">Submit : </label>
                                            <button type="submit" class="btn btn-outline-primary">Save
                                                Update</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form><!-- End General Form Elements -->
        </div>
    </section>
@endsection
@section('sweetalert')
    <script>
        @if (session()->has('sukses'))
            Toast.fire({
                icon: "success",
                title: "{{ session()->pull('sukses') }}"
            });
        @elseif (session()->has('danger'))
            Toast.fire({
                icon: "error",
                title: "{{ session()->pull('danger') }}"
            });
        @endif
    </script>
@endsection
