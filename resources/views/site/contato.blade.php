@extends('layout.layout')
@section('title','Contato')
@section('conteudo')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header page-contact py-5">
            <h1 class="text-center text-white display-6">Contato</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url ('/') }}">Início</a></li>
                <li class="breadcrumb-item active text-white">Contato</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Informações de Contato</h1>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100"
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!4v1712807688015!6m8!1m7!1se1eOUprlFHj4o_sCrn-y7g!2m2!1d-23.49869451984443!2d-46.43230049624198!3f115.04553080290442!4f0.5862112033602074!5f1.5125059567623418" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                {{-- <iframe class="rounded w-100"
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="" class="">
                                <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Seu Nome:">
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Seu Email:">
                                <textarea class="w-100 form-control border-0 mb-4 textarea-form" rows="5" cols="10" placeholder="Sua Mensagem:"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Enviar</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Endereço</h4>
                                    <p class="mb-2">Av. Rosária, 1381 - São Miguel Paulista</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-2">sukysorveteria@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telefone</h4>
                                    <p class="mb-2">11 99999-9999</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection
