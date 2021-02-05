<script type="text/javascript">
    $(document).ready(function(){
        $('#distance-calculator').distanceCalculator();
    });
    //
</script>
<div class="container">
    <div class="container-fluid">
        <div id="distance-calculator" class="p-4">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div id="validate-result" class="alert alert-danger"></div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label font-weight-bold" for="FromZip">Zip Code From</label>
                        <div class="col-md-9">
                            <input type="number" value="95050" name="FromZip" id="FromZip" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label font-weight-bold" for="ToZip">Zip Code To</label>
                        <div class="col-md-9">
                            <input type="number" value="87510" name="ToZip" id="ToZip" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row float-right">
                            <span id="loader" class="td-loader float-right"><i
                                        class="fas fa-spinner fa-spin"></i></span> <a href="javascript:void(0)" class="btn btn-success">Calculate</a>
                    </div>


                    <div id="results"></div>

                </div>
            </div>
        </div>
    </div>
</div>