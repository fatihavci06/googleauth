@extends('layouts.back.master')
@section('content')



    <div class="row g-0">

        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">Personel Ekle</h6>
                        </div>
                        <div class="col-auto d-flex">
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body h-100">
                    @if(session('success'))
                        <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                            <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                            <p class="mb-0 flex-1">{{session('success')}}</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if($errors->any())
                            <div class="alert alert-warning border-2 d-flex align-items-center" role="alert">

                                <ul>
                               @foreach($errors->all() as $e)

                                    <li>{{$e}}</li>

                                 @endforeach
                                </ul>
                            </div>
                    @endif
                    <form action="{{ route('personel.eklepost') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="container">
                        <div class="row ">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">Vesikalık Fotoğraf</label>
                                    <input class="form-control" required name="avatar" id="avatar" type="file"  value="{{old('ilan_name')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="firstname">Adı</label>
                                    <input class="form-control" required name="firstname" id="firstname" type="text"  value="{{old('ilan_name')}}" />
                                </div>
                            </div>


                        </div>
                        <div class="row ">

                            <div class="col-6">
                                <label class="form-label" for="konum">Soyadı</label>
                               <input class="form-control" type="text" id="lastname" name="lastname" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="kampus">Sistem Rolü</label>
                                <select class="form-control" id="sistem_rol" name="sistem_rol">
                                    <option value="1">Öğretmen</option>
                                    <option value="2">Zümre Başkanı</option>
                                    <option value="3">İdari Personel</option>
                                    <option value="4">Okul Yöneticisi</option>
                                    <option value="5">Hizmet Personeli</option>
                                    <option value="6">Kurucular</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-2">


                            <div class="col-6">
                                <label class="form-label" for="portal_rol">Portal Rolü</label>
                                <select class="form-control" name="portal_rol" id="portal_rol">
                                    <option value="1">Öğretmen</option>
                                    <option value="2">Yönetici</option>
                                    <option value="3">İdari</option>
                                    <option value="4">Hizmet</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="brans">Branş</label>
                                <select class="form-control" name="brans" id="brans">
                                     @foreach ($brans as $b )
                                     <option value="{{ $b->id }}">{{ $b->brans_adi }}</option>
                                     @endforeach


                                </select>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="ekgorev">Ek Görev Tanımı</label>
                                    <input class="form-control" required name="ekgorev" id="ekgorev" type="text"  value="{{old('ilan_name')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="etutvercekmi">Etüt Verecek Mi?</label>
                                    <select class="form-control" name="etutvercekmi" id="etutvercekmi">
                                        <option value="Evet">Evet</option>
                                        <option value="Hayır">Hayır</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="dtarih">Doğum Tarihi</label>
                                    <input class="form-control" required name="dtarih" id="dtarih" type="date"  value="{{old('dtarih')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="cepno">Cep Telefonu </label>
                                    <input type="number" name="cepno" class="form-control">
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="eposta">Eposta</label>
                                    <input class="form-control" required name="eposta" id="eposta" type="eposta"  value="{{old('eposta')}}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="gmail">Gmail</label>
                                    <input class="form-control" required name="gmail" id="gmail" type="gmail"  value="{{old('gmail')}}" />
                                </div>
                            </div>



                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label class="form-label" for="adressabahservis">Adres (Sabah Servisi)</label>
                                <div class="min-vh-30">
                                    <input type="text" class="form-control" id="adressabahservis" name="adressabahservis">

                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label class="form-label" for="adressabahservis">Adres (Akşam Servisi)</label>
                                <div class="min-vh-30">
                                    <input type="text" class="form-control" id="adresaksamservis" name="adresaksamservis">

                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button class="btn btn-primary form-control">Kaydet</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{asset('tema/public/')}}/vendors/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 250
        });
    </script>
@endsection
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
