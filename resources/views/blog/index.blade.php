@extends('layouts.app_blog')
@section('content')
<div class="title"><i class="fa fa-new"></i>Últimas postagens</div>
    <div class="row">
        <div class="col-sm-8 p-0 bd-white">
            <a href="#">
                <div class="destaque row-destaque" style="background-image: url('{{$last_notice->image_url}}')">
                    <div class="notice-text">
                        <div class="notice-title">
                            {{$last_notice->title}}
                        </div>
                        <div class="description">
                            {{strip_tags($last_notice->description)}}                    
                        </div>
                    </div>        
                </div>
            </a>

        </div>
        <div class="col-sm-4 ">
            @foreach ($notices as $i)
            <div class="row ">
                <div class="col-sm-12 p-0 bd-white">
                    <a href="#">
                        <div class="destaque row-destaque-min" style="background-image: url('{{$i->image_url}}')">
                        <div>
                            <div class="notice-text">
                                <div class="notice-title">
                                    {{$i->title}}
                                </div>
                                <div class="description">
                                    {!!strip_tags($i->description)!!}                                    
                                </div>
                            </div>
                        </div>
                        </div>

                    </a>
                </div>
            </div>
                
            @endforeach
           
        </div>

    </div>
@endsection