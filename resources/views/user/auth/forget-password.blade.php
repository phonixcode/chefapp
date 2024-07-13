@extends('layouts.main')

@section('content')
    <section class="spad">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="contact__form">
                    <h3 class="mb-4">Forget Password</h3>

                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Email</label>
                                <input type="email" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="site-btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
