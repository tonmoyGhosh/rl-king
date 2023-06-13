<form action="{{ route('request-ivr-content-play-report') }}" method="POST">
    @csrf
    <div class="card-search " id="kt_menu_6253a6203b93d">

        <div class="d-flex align-items-center justify-content-start flex-wrap">
            
            <div class="mr-0 mr-sm-0 mr-md-5 mb-3 mb-md-2 mb-lg-2 select_container">
                <label for="fromDate" class="d-block">From Date</label>
                <input class="form-control" type="date" name="fromDate" id="fromDate" required>
            </div>

            <div class="mr-0 mr-sm-0 mr-md-5 mb-3 mb-md-2 mb-lg-2 select_container">
                <label for="toDate" class="d-block">To Date</label>
                <input class="form-control" type="date" name="toDate" id="toDate" required>
            </div>
            
            <div class="mr-0 mr-sm-0 mr-md-5 mb-3 mb-md-2 mb-lg-2 select_container">
                <label for="" class="d-block invisible">search-btn</label>
                <button id="searchReport" class="btn btn-success select_container" type="submit">Search</button>
            </div>

        </div>
    
    </div>
</form>

