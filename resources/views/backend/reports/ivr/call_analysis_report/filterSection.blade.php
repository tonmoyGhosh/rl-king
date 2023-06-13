<form action="{{ route('request-ivr-call-analysis-report') }}" method="POST">
@csrf
    <div class="card-search" id="kt_menu_6253a6203b93d">

        <!--begin:: Filter-->
        <!--begin:: Select-box-->
        <div class="d-flex align-items-center justify-content-start me-md-n5 justify-content-lg-start justify-content-xxl-between flex-wrap">
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="gender" class="d-block">Gender</label>
            <select class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Select Gender"
                                    data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                                    name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                <option value="Unspecified">Unspecified</option>
            </select>
        </div>

        
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="division" class="d-block">Division</label>
            <select class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Select Division"
                                    data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                    name="division" id="division">
                <option></option>
                <option value="">Select Division</option>
                @foreach ($division as $v)
                    @if($v->division == null)
                        <option value="Unspecified">Unspecified</option>
                    @else
                        <option value="{{ $v->division }}">{{ ucwords(str_replace('-',' ',$v->division)) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="district" class="d-block">District</label>
            <select class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Select District"
                                    data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                    name="district" id="district">
                <option value="">Select District</option>
                @foreach ($district as $v)
                    @if($v->district == null)
                        <option value="Unspecified">Unspecified</option>
                    @else
                        <option value="{{ $v->district }}">{{ ucwords(str_replace('-',' ',$v->district)) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="area" class="d-block">Area</label>
            <select class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Select Area"
                                    data-dropdown-parent="#kt_menu_6253a6203b93d" data-allow-clear="true"
                    name="area" id="area">

                <option value="">Select Area</option>
                @foreach ($area as $v)
                    @if($v->area == null)
                        <option value="Unspecified">Unspecified</option>
                    @else
                        <option value="{{ $v->area }}">{{ ucwords(str_replace('-',' ',$v->area)) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="fromDate" class="d-block">From Date</label>
            <input class="form-control" type="date" name="fromDate" id="fromDate" required>
        </div>
        <div class="mr-0 mr-sm-0 mr-md-2 mb-3 mb-md-2 me-md-5 mb-lg-2 select_container">
        <label for="toDate" class="d-block">To Date</label>
            <input class="form-control" type="date" name="toDate" id="toDate" required>
        </div>
        </div>
        
        <div class="mb-3 mb-md-2 mb-lg-2 select_container text-end">
            <label for="" class="d-block invisible">search-btn</label>
            <button id="searchReport" class="btn btn-success select_container" type="submit">Search</button>
        </div>

    </div>
</form>

@push('scripts')
    <script>
        $("#searchReport").click(function(){
            $(".preloader").show();
        });

        $('input[required]').on('invalid', function(e){
            $(".preloader").hide();
        });

        $("#area").on('change', function () {
            $('#district').attr("disabled", true);
            $('#division').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#district').attr("disabled", false);
                $('#division').attr("disabled", false);
            }
        });

        $("#district").on('change', function () {
            $('#area').attr("disabled", true);
            $('#division').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#area').attr("disabled", false);
                $('#division').attr("disabled", false);
            }
        });

        $("#division").on('change', function () {
            $('#area').attr("disabled", true);
            $('#district').attr("disabled", true);
            if(($(this).val()) === ""){
                $('#area').attr("disabled", false);
                $('#district').attr("disabled", false);
            }
        });
    </script>
@endpush
