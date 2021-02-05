<script type="text/javascript">
    $(document).ready(function(){
        $('#distance-calculator').distanceCalculator();
    });
    //
</script>
<div>
    <div id="distance-calculator">
        <div id="validate-result"></div>
        <label>Zip Code From</label>
        <input type="number" value="95050" name="FromZip" maxlength="7" max="7">
        <label>Zip Code To</label>
        <input type="number" value="87510" name="ToZip" maxlength="7" max="7">
        <a href="javascript:void(0)" class="btn">Calculate</a>
        <div id="results">

        </div>
    </dim>
</div>