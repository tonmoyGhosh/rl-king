<!DOCTYPE html>
<html>
    <head>
        <style>
            .center {
                margin: auto;
                width: 60%;
                border: 3px solid #73AD21;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        
        <br>
        <div class="center">
            <audio controls style="width: 100%">
                <source src="{{ $path }}" type="audio/mpeg">
            </audio>
        </div>

    </body>
</html>

<!-- Download File Code Start -->
<!-- <a class="btn btn-success" id="downloadClipFile" href="{{ $path }}" download></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    
    $(document).ready(function() {
        document.getElementById("downloadClipFile").click();
        $("#downloadClipFile").trigger('click');
    });

</script> -->
<!-- Download File Code End -->