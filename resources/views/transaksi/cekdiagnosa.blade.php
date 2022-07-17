@extends('templates/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templates/navigation')


<!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Pilih  <small>Gejala</small></h3>
                </div>
            </div>
            <form class="col-6" method="post" action="{{ url('diagnosa/proses') }}">
            {!! csrf_field() !!}
                <div style="overflow: scroll; height: 467px;">
                    <?php
                        foreach ($DataDiagnosa as $key => $d) {
                    ?>
                    <div class="input-group md-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" value="{{ $d->kode }}" name="isi[]">
                                <label for="checkbox">{{ $d->gejala }}</label>
                            </div>
                            
                            <!-- <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{ $d->gejala }}"> -->
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="diagnosa" value="Proses">
            </form>
        </div>


                 
@endsection


