@extends('Manage.layouts.app')

@section('content')
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <div class="header bg-primary">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0"><a
                                    href="{{ route('dashboard') }}">Attendance</a></h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark radius">
                                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}"><i class="fas fa-book-open"></i></a></li>
                                    <li class="breadcrumb-item">{{ $pageTitle }}</li>
                                    <li class="breadcrumb-item active">Assign Students</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <form action="{{ route('subject.attach-student', $subject) }}" method="post">
                @csrf
            <div class="row">
                   <div class="col-12">
                       <div class="card">
                           <!-- Card header -->
                           <div class="card-header border-0">
                               <h3 class="mb-0">{{ $subTitle }}</h3>
                           </div>
                           <!-- Assign Student Form -->
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label class="form-control-label" for="students">Select All</label>
                                   <input type="checkbox" id="select-all">
                                   {{-- <label class="form-control-label" for="students">Select Students*</label> --}}
                                   <select id="students" name="students[]" multiple="multiple" class="form-control radius">
                                       @foreach($students as $student)
                                           <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                                       @endforeach
                                   </select>
                                   @error('students')
                                   <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="card-footer">
                               <button type="submit" class="btn btn-primary btn-block radius">Assign</button>
                           </div>
                       </div>
                   </div>
            </div>
            </form>
        </div>


    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#students').select2();

        $('#select-all').click(function() {
            if($(this).is(':checked')) {
                $('#students > option').prop('selected', true);
                $('#students').trigger('change');
            } else {
                $('#students > option').prop('selected', false);
                $('#students').trigger('change');
            }
        });
    });
</script>
@endpush


