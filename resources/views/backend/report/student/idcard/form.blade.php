<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Student Idcard @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Student Idcard Print
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><i class="fa fa-file-pdf-o"></i> Report</li>
            <li class="active"><i class="fa fa-id-card"></i> Student Idcard</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" target="_blank" action="{{URL::Route('report.student_idcard')}}" method="POST" enctype="multipart/form-data">
                        <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b></p>
                            </div>
                        </div>
                        <div class="box-body">
                            @csrf
                            @if(count($errors->all()))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="template_id">Template<span class="text-danger">*</span></label>
                                        {!! Form::select('template_id', $templates, null , ['placeholder' => 'Pick a template...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('template_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="side">Side<span class="text-danger">*</span></label>
                                        {!! Form::select('side', ["front"=>"Front Side","back"=>"Back Side"], "front" , ['placeholder' => 'Pick a side...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('side') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="academic_year">Academic Year<span class="text-danger">*</span></label>
                                        {!! Form::select('academic_year', $academic_years, null , ['placeholder' => 'Pick a year...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="class_id">Class<span class="text-danger">*</span></label>
                                        {!! Form::select('class_id', $classes, null , ['placeholder' => 'Pick a class...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('class_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="section_id">Section<span class="text-danger">*</span></label>
                                        {!! Form::select('section_id', [], null , ['placeholder' => 'Pick a section...','class' => 'form-control select2', 'id' => 'section_id_filter', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('section_id') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        window.section_list_url = '{{URL::Route("academic.section")}}';
        $(document).ready(function () {
            Reports.studentIdcardPrint();
        });
    </script>
@endsection
<!-- END PAGE JS-->
