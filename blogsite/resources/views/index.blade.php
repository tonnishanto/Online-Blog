@extends('layouts.front')

@section('title')
    Laravel Blog
    @endsection

@section('content')

  @include('partial.navbar')

<section class="container-fluid" id="section1">
    <div class="v-center">
        <h1 class="text-center">My Laravel Blog</h1>
        <h2 class="text-center lato animate slideInDown">Change It To Say <b>Something</b> Unique</h2>

    </div>
    <a href="#section2">
        <div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
        </div>
    </a>
</section>

<section class="container-fluid" id="section2">
    <div class="container">
        <div class="row">
            <h3 class="text-center text-uppercase text-success">All Post</h3>
            <hr>

            <div class="col-sm-8">
                @foreach($articals as $artical)
                <article>
                    <h2>{!! $artical->title !!}</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fa fa-folder-open" aria-hidden="true" id="artical"></i>{!! $artical->category->name !!}
                            <i class="fa fa-user" aria-hidden="true" id="user"></i> {!! $artical->user->name !!}

                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-calendar" aria-hidden="true" id="time"></i>{!! $artical->created_at !!}
                        </div>

                    </div>
                    <br>
                    <td><img src="{!! url('uploade/image')!!}/{!! $artical->image !!}" width="750px" height="400px" alt=""></td>
                    <br>
                    <br>
                    <p>
                       {!! substr($artical->description,0,300) !!}.....
                    </p>
                    <br>
                    <a class="btn btn-primary" href="{!! route('artical',$artical->id) !!}" role="button">Read more</a>
                    <hr>

                </article>

                    @endforeach

                {!! $articals->render() !!}

            </div>


            <div class="col-sm-4">

                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center">Latest Post</div>

                    <!-- List group -->
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>


                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading text-center">Category</div>

                    <!-- List group -->

                    @foreach($cates as $cat)
                        <ul class="list-group">
                            <li class="list-group-item">{!! $cat->name !!}</li>

                        </ul>
                    @endforeach
                </div>

            </div>

        </div>
        <!--/row-->
        <div class="row">
            <br>
        </div>
    </div>
    <!--/container-->
</section>



<section class="container-fluid" id="section7">
    <div class="row">
        <!--fontawesome icons-->
        <div class="col-sm-1 col-sm-offset-3 col-xs-4 text-center">
            <i class="fa fa-github fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-foursquare fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-pinterest fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-google-plus fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-twitter fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-dribbble fa-4x"></i>
        </div>
    </div>
</section>

@include('partial.footer')

@endsection
