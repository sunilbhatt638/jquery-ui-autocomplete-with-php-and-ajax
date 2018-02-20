<?php
/*
Author : Sunil Bhatt
*/
require_once("dbclass.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>jQuery UI autocomplete with PHP and AJAX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function()
        {
            $("#autocompleteid").autocomplete({
                minLength: 1,
                delay : 400,
                source: function(request, response) { 

                    jQuery.ajax({
                       url:      "search.php",
                       data:    {
                                    countryname : request.term
                                },
                       dataType: "json",
                       success: function(data)
                       {
                            response(data);
                        }   
                    })
                },
                select:  function(e, ui)
                {
                    var countryId = ui.item.id;
                    $("#SelectedCountryId").val(countryId);
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>jQuery UI autocomplete with PHP and AJAX</h2>
        <div class="col-md-12">
            <div class="col-md-6">
                <form>
                    <div class="form-group row">
                        <label for="country" class="col-sm-4 col-form-label">Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="autocompleteid" placeholder="Search country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="SelectedCountryId" class="col-sm-4 col-form-label">Selected Country Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="SelectedCountryId">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
