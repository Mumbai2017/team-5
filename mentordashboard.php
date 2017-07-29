<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dash Board</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="webUIOne.css">
</head>
<body style="background-color: linen">
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-WDM-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CEQUE</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-WDM-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li><a href="lectureplan.php">Lecture Plans</a></li>
                <li><a href="#">Logout</a></li>         <!-- Add the logout link -->
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/-u-j7uqU7sI"></iframe>  <!-- Fetch the video link from the database -->
    </div>
</div>

<div class="row outer-margin">
    <div class="col-xs-12" id="comments">
        <!-- facebook comments -->
        <!-- <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div> -->

        <!-- begin wwww.htmlcommentbox.com -->
        <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
        <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
        <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1501351997452");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
        <!-- end www.htmlcommentbox.com -->
    </div>
</div>

<footer class="site-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <h3>Contact Address</h3>
                <address>
                    <b>Centre for Equity and Quality in Universal Education</b>
                    C/3 Sunita Apartments, Gujjar Lane,
                    Santacruz (W), Mumbai - 400054<br>
                    Maharashtra, INDIA<br>
                    Email: admin@ceque.org<br>
                    Phone: +91-22-2605-3242
                </address>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="col-md-5">&copy; 2017 - 2018</div>
        </div>
</footer>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>