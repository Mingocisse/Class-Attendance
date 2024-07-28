<!-- Modal -->
<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('student.store') }}">
                <div class="modal-body text-left">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Student information</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="first_name">First Name*</label>
                                    <input type="text" id="first_name" class="form-control first_name radius @error('first_name') is-invalid @enderror"
                                            name="first_name" placeholder="Try John Snow" required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="last_name">Last Name*</label>
                                    <input type="text" id="last_name" class="form-control last_name radius @error('last_name') is-invalid @enderror"
                                            name="last_name" placeholder="Try John Snow" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="index_number">Index Number*</label>
                                    <input type="text" id="index_number" class="form-control index_number radius @error('index_number') is-invalid @enderror"
                                            name="index_number" placeholder="Try John Snow" required>
                                    @error('index_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email*</label>
                                    <input type="email" id="email" class="form-control email radius @error('email') is-invalid @enderror"
                                           name="email" placeholder="Try john@attendance.com" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Phone number*</label>
                                    <input type="text" id="phone" class="form-control phone radius @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="Try +961 01 123456" required>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary radius" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
