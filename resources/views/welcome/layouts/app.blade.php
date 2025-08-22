<!DOCTYPE html>
<html lang="en-US">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{csrf_token()}}" />
        @yield('title')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset(general()->favicon())}}" />
        @yield('SEO')
        <!-- Google Font CDN-->
        <link href="https://fonts.googleapis.com/css?family=Source Code Pro" rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="{{asset(assetLink().'/css/demo.css')}}" />
        
        <!-- Google Font CDN -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&family=Source+Code+Pro:wght@400;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.1/themes/smoothness/jquery-ui.min.css" integrity="sha512-hQrNVZL4jUAHcqbF25UiEFZ/NGCbhAWI9aVAUfI5H+sG17C1Lc4Tm4HpU5A69E1jquKr3f0LnxD3uzfoCj/koQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Fancybox CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
        
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
        <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
        
        <!-- Slick Slider CSS CDN-->
        <link rel="stylesheet" type="text/css" href="{{asset(assetLink().'/css/slick.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset(assetLink().'/css/slick-theme.css')}}" />
        
        <link rel="stylesheet" type="text/css" href="{{asset(assetLink().'/css/fancybox.css')}}" />

        <!-- Matis Menus CSS -->
        <link rel="stylesheet" href="{{asset(assetLink().'/css/metisMenu.css')}}" />
        
        <link rel="stylesheet" type="text/css" href="{{asset(assetLink().'/css/style.css')}}" />
        <style>
            body {
                font-family: 'SolaimanLipi', sans-serif;
            }
        </style>
        @stack('css')
    </head>
    
    <body>
        
        <!--Header Part Include Start-->
        @include(welcomeTheme().'layouts.header')

        <!--Main Content Section Start-->
        <div class="main-container">
            <div class="container">
                @yield('contents')
            </div>
        </div>
        <!--Main Content Section End-->
        
        <!--Footer Part Include Start-->
        @include(welcomeTheme().'layouts.footer')
        
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js" integrity="sha256-AlTido85uXPlSyyaZNsjJXeCs07eSv3r43kyCVc8ChI=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src="{{asset(assetLink().'/js/metisMenu.min.js')}}"></script>
        <script type="text/javascript" src="{{asset(assetLink().'/js/slick.min.js')}}"></script>
        
        <!-- Moment.js for Gregorian/Hijri -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
        
        <!-- Bangla Date -->
        <script src="https://cdn.jsdelivr.net/gh/AhmedMRaihan/BanglaDateJS@master/src/buetDateTime.js"></script>
        
        <!-- Custom Script for this Design -->
        <script src="{{asset(assetLink().'/js/myjquery.js')}}"></script>

        <script>
            $(document).ready(function(){
                $('.mobile-search-icon').click(function() {
                    $('#mobileSearchOverlay').fadeIn();
                });
        
                // Close mobile search overlay
                $('#closeMobileSearch').click(function() {
                    $('#mobileSearchOverlay').fadeOut();
                });
                
                $(function() {
                    $("#datepicker").datepicker({
                        maxDate: 0,
                        dateFormat: "yy-mm-dd", // important to format the date correctly
                        onSelect: function(dateText, inst) {
                            console.log("Selected date: " + dateText);
                            // build the URL and redirect
                            var formattedDate = dateText.replace(/\//g, '/'); // just to be sure
                            window.location.href = '/archive/' + formattedDate;
                        }
                    });
                });
                  
                // Gregorian date
                const englishDate = moment().format('dddd. DD MMMM YYYY');
                console.log(englishDate);
                
        
                // Bangla Date (using buetDateTime.js)
                const bd = new buetDateConverter(new Date());
                const bangla = bd.convert("j F Y");
    
                // Combine Bangla date in English
                const banglaDate = bangla;
                
                // Hijri date
                const hijriDate = moment().format('iD iMMMM iYYYY');
        
                // Final output
                const output = `${englishDate}<br>${banglaDate}, ${hijriDate}`;
        
                // Update HTML
                $('.today').html(output);





                $("#division").on("change", function(){
                    var id = $(this).val();
                    if(id==''){
                    $('#district').empty().append('<option value="">No District</option>');
                    $('#city').empty().append('<option value="">No City</option>');
                    }
                    var url ='{{url('geo/filter')}}' + '/'+id;
                    $.get(url,function(data){
                        $('#district').empty().append(data.geoData);
                        $('#city').empty().append('<option value="">No City</option>');
                    });   
                });

                $("#district").on("change", function(){
                    var id = $(this).val();
                    if(id==''){
                    $('#city').empty().append('<option value="">No City</option>');
                    }
                    var url ='{{url('geo/filter')}}' + '/'+id;
                    $.get(url,function(data){
                        $('#city').empty().append(data.geoData);  
                    });   
                });
                
            });
        </script>
        
        <script>
            $(document).on('click','.subsriberbtm',function(e){
              e.preventDefault();
               var url = $('#subscirbeForm').data('url');
               var subscribeEmail =$('#subscribeEmail').val();
                    $.ajax({
                      url: url,
                      type: 'POST',
                      dataType: 'json',
                       data: {email : subscribeEmail},
                      cache: false,
        
                    })
                    .done(function(data) {
                        if(data.success)
                          {
                            $("#subscribeemailMsg").html("<p style='color: #f6f6f6;background: #009688;margin: 5px 0;padding: 4px 5px;border-radius: 4px;font-weight: bold;line-height: 14px;font-size: 12px;'>"+ data.message +"</p>");
                            $("#subscribeEmail").css("border","");
                            $("#subscirbeForm")[0].reset();
                          }else{
                            $("#subscribeemailMsg").html("<p style='color: #f6f6f6;background: #ff9800;margin: 5px 0;padding: 4px 5px;border-radius: 4px;font-weight: bold;line-height: 14px;font-size: 12px;'>"+ data.message +"</p>");
                          }
                    })
                    .fail(function() {
                      // alert("error");
                    });
        
            });
        
            $("#subscribeEmail").keyup(function(){
                  if(validateEmail()){
                      $("#subscribeEmail").css("border","2px solid green");
                      $("#subscribeemailMsg").html("<p style='color: #f6f6f6;background: #009688;margin: 5px 0;padding: 4px 5px;border-radius: 4px;font-weight: bold;line-height: 14px;font-size: 12px;'>Validated Email</p>");
                  }else{
                        var subscribeEmail=$("#subscribeEmail").val();
                       if(subscribeEmail==''||subscribeEmail==null || subscribeEmail=='undefined'){
                            $("#subscribeemailMsg").html("<p style='color: white;background: red;margin: 5px 0;padding: 4px 5px;border-radius: 4px;font-weight: bold;line-height: 14px;font-size: 12px;'>Please Get a Verified Email</p>");
                        }else{
                          $("#subscribeEmail").css("border","2px solid red");
                          $("#subscribeemailMsg").html("");
                        }
                  }
              });
        
            function validateEmail(){
                  var subscribeEmail=$("#subscribeEmail").val();
        
                   var reg =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                   if(reg.test(subscribeEmail)){
                      return true;
                   }else{
                      return false;
              }
        
            }
        </script>
        
        @stack('js')
        
    </body>
</html>
