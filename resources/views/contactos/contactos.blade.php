@extends('layouts.plantilla')

@section('title', 'Contactos')

@section('header')
    <div class="col-lg-10">
        <h2>Contactos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Contactos</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="d-flex align-content-center">
        <a href="{{ url('/contactos/crear/') }}"> <button class="btn btn-primary col-md-12">Nuevo Contacto</button></a>
    </div>



    <hr>
    <div class="row">
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a2.jpg">


                    <h3 class="m-b-xs"><strong>John Smith</strong></h3>

                    <div class="font-bold">Graphics designer</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a1.jpg">


                    <h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

                    <div class="font-bold">CEO</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a3.jpg">


                    <h3 class="m-b-xs"><strong>Monica Smith</strong></h3>

                    <div class="font-bold">Marketing manager</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a4.jpg">


                    <h3 class="m-b-xs"><strong>Michael Zimber</strong></h3>

                    <div class="font-bold">Sales manager</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a5.jpg">


                    <h3 class="m-b-xs"><strong>Sandra Smith</strong></h3>

                    <div class="font-bold">Graphics designer</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a6.jpg">


                    <h3 class="m-b-xs"><strong>Janet Carton</strong></h3>

                    <div class="font-bold">CFO</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a1.jpg">


                    <h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

                    <div class="font-bold">CEO</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a7.jpg">


                    <h3 class="m-b-xs"><strong>John Smith</strong></h3>

                    <div class="font-bold">Graphics designer</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a2.jpg">


                    <h3 class="m-b-xs"><strong>John Smith</strong></h3>

                    <div class="font-bold">Graphics designer</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a1.jpg">


                    <h3 class="m-b-xs"><strong>Alex Johnatan</strong></h3>

                    <div class="font-bold">CEO</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a3.jpg">


                    <h3 class="m-b-xs"><strong>Monica Smith</strong></h3>

                    <div class="font-bold">Marketing manager</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact-box center-version">

                <a href="profile.html">

                    <img alt="image" class="img-circle" src="img/a4.jpg">


                    <h3 class="m-b-xs"><strong>Michael Zimber</strong></h3>

                    <div class="font-bold">Sales manager</div>
                    <address class="m-t-md">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>

                </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                        <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                    </div>
                </div>

            </div>
        </div>


    </div>


@endsection
