<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Vitl
                </div>
                <form id="myForm">
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" class="form-control" id="search">
                        <label for="dupes">exclude duplicates</label>
                        <input type="checkbox" name="dupes" id="dupes">
                        <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="flex">
                <div id="showresults"></div>
            </div>            
        </div>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            jQuery(document).ready(function(){
                jQuery('#ajaxSubmit').click(function(e){
                console.log('here');
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/users/search') }}",
                    method: 'post',
                    data: {
                        terms: $('#search').val(),
                        dupes: $('#dupes').is(':checked'),
                    },
                    success: function(result){
                        
                        console.log(result);

                        var html = '<table>';

                        $.each(result, function(i, match) {
                            html += '<tr><td>' + match.first_name + '</td><td>' + match.last_name + '</td><tr>';
                        });

                        html += '</table>';

                        $('#showresults').append(html);
                    }});
                });
                });
        </script>
    </body>
</html>
