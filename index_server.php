<?php session_start();

// define variables and set to empty values

$nameDis = $phoneDis = $emailDis = $subjectDis = $messageDis = ""; // Declare var for each field in a form. if get error means, have to save typed values
$nameFlag = $phoneFlag = $emailFlag = $subjectFlag = $messageFlag = $captchaFlag = false;

if(isset($_POST['Submit']))
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        //validation for each field is not validate here---------> that is in eof (using validator class)
        if (!empty($_POST["name"])) 
        {
            $nameDis = test_input($_POST["name"]);
            $nameFlag = true; //Flag set if field is non empty and Valid only
        }

        if (!empty($_POST["phone"])) 
        {
            $phoneDis = test_input($_POST["phone"]);
            $phoneFlag = true; //Flag set if field is non empty and Valid only
        }
              
        if (!empty($_POST["email"])) 
        {
            $emailDis = test_input($_POST["email"]);
            $emailFlag = true; //Flag set if field is non empty and Valid only
        }
        if (!empty($_POST["subject"]))
        {
            $subjectDis = test_input($_POST["subject"]);
            $subjectFlag = true; //Flag set if field is non empty and Valid only
        }
        if (!empty($_POST["message"]))
        {
            $messageDis = test_input($_POST["message"]);
            $messageFlag = true; //Flag set if field is non empty and Valid only
        }

        // code for check captcha validation
        if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
        {          
            echo '<script type="text/javascript">setTimeout(function () { swal("Captcha Mismatch","...","error");}, 1000);</script>'; 
            echo '<script type="text/javascript">setTimeout(function () { document.getElementById("captcha_code").focus();}, 0);</script>';             
        }     
        else// If Captcha verification is Correct set the flag  
        {          
            $captchaFlag=true;
        }

        //If all data entred in form is correct, then sent a mail to specified mail ID
        if($nameFlag == true && $phoneFlag == true && $emailFlag == true && $subjectFlag == true && $messageFlag == true && $captchaFlag == true){

            require("php/class.phpmailer.php");
            require("php/sentemail.php");

            $nameErr = $phoneErr = $emailErr = "";
            $nameDis = $phoneDis = $emailDis = $subjectDis = $messageDis = "";
                       
        }
    }
}   

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vanaaweb</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="My Resume Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
            SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!-- Website Logo -->

        <link rel="icon" href="http://www.vanaaweb.comxa.com/images/vanaaweb-icon.ico" type="image/x-icon" />
        <!-- //Website Logo -->

        <!--Custom Theme files-->
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
        <link href="css/swipebox.css">
        <!--//Custom Theme files-->

        <!--js-->
        <script src="js/jquery-1.11.1.min.js"></script> 
        <!-- //js -->

        <!--Links For Sweet Alert-->        
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <script src="js/sweetalert.min.js"></script> 
        <!--//Links For Sweet Alert-->  

        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Overlock:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <!--//web-fonts-->

        <!--For Loading button symbol-->
        <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
        <!--//For Loading button symbol-->

        <!--start-smooth-scrolling-->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script> 
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){     
                        event.preventDefault();
                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                    });
                });
        </script>
        <!--//end-smooth-scrolling-->

        <!-- Refresh the Captcha Image-->
        <script type='text/javascript'>
        function refreshCaptcha(){
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }

        </script>
        <!-- //Refresh the Captcha Image-->

        <!-- a helper script for vaidating the form-->
        <script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>

</head>

<body>
<!--banner-->
        <div id="home" class="banner">
            <div class="banner-info">
                <div class="container">         
                    <div style="margin-top: -50px;">
                        <ul class="nav navbar" style="text-align: left !important; margin-left: 5%;">
                            <li>
                                <a href="javascript:window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</a>
                            </li>
                            <li>
                                <!-- Trigger the modal with a button -->
                                <a href="#persona" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> My Photo</a>
                            </li>
                        </ul>
                    </div>              
                    <br> 


  

                    <!-- Modal -->
                    <div class="modal fade" id="persona" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Vanaja Sutharsan</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="images/img.jpg" class="img-responsive img-centered" alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//Model-->

                   
                    <div class="col-md-4 header-left">
                        <img src="images/img.jpg" alt=""/>
                    </div>
                    <div class="col-md-8 header-right">
                        <h2>Hello...</h2>
                        <h1>I'm Vanaja Sutharsan</h1>
                        <h6>Software Engineer</h6>
                        <ul class="address">
                            <li>
                                <ul class="address-text">
                                    <li><b>D.O.B</b></li>
                                    <li>19-01-1991</li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>MOBILE </b></li>
                                    <li>+91 95786 48825</li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>ADDRESS </b></li>
                                    <li>38/65 Kattabomman Street</li>
                                    <li>Tharamani, Chennai - 600 113</li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>E-MAIL </b></li>
                                    <li><a href="mailto:vanamca2014@gmail.com"> vanamca2014@gmail.com</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>WEBSITE </b></li>
                                    <li><a href="http://vanaaweb.com">www.vanaaweb.comxa.com</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>          
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!--//banner-->
        <!--top-nav-->
        <div class="top-nav wow">
            <div class="container">
                <div class="navbar-header logo">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        Menu
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="menu">
                        <ul class="nav navbar">
                            <li><a href="#about" class="scroll">About</a></li>
                            <li><a href="#work" class="scroll">Experience</a></li>
                            <li><a href="#education" class="scroll">Education</a></li>
                            <li><a href="#skills" class="scroll">Skills</a></li>
                            <li><a href="#projects" class="scroll">My portfolio</a></li>
                            <li><a href="#hobbies" class="scroll">Hobbies</a></li>
                            <li><a href="#cluster" class="scroll">Cluster</a></li>
                            <li><a href="#contact" class="scroll">Contact</a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>  
        <!--//top-nav-->
        <!--about-->
        <div id="about" class="about">
            <div class="container">
                <h3 class="title"> About Me</h3>
                <div class="col-md-8 about-left">
                    <p>
                        To be a successful person in the field
                        of software development with total
                        commitment, professionalism, fast
                        flexible learning skills and serve in a
                        challenging environment where the
                        qualification, skills and abilities can
                        be applied effectively.
                    </p><br>
                    <p>
                        One year of Experience in the design and developing web and Mobile
                        Applications in MongoDB and MySQL DB using GO Lang. Proficient in Developing Android Native and Hybrid Mobile
                        Application with MongoDB & SQLite DB. Trained in Golang Expertise in IBM Mobile First tool and Eclipse.
                    </p><br>
                    <p>
                        I have the Spearhead for some projects. A highly motivated and ambitious individual able to give timely and accurate advice, guidance and support to team members and
                        individuals and also cohesive team worker. Self-reliance, initiative & ability to manage time, projects and resources
                    </p>
                </div>
                <div class="col-md-4 about-right">
                    <ul>
                        <h5>ACHIEVEMENTS</h5>
                        <li><span class="glyphicon glyphicon-menu-right"></span> Proficiency student in MCA during the year 2011-2014</li>
                        <li><span class="glyphicon glyphicon-menu-right"></span> Best Outstanding student in MCA during the year 2011-2014</li>
                        <li><span class="glyphicon glyphicon-menu-right"></span> 20 day&rsquo;s internship in Android at Malaris Software Solution</li>
                        <li><span class="glyphicon glyphicon-menu-right"></span> Typing writing Eng. Lower I class</li>
                        <li><span class="glyphicon glyphicon-menu-right"></span> PC Hardware Knowledge </li>
                        <li><span class="glyphicon glyphicon-menu-right"></span> Hindi (Madhyama) &#45; I class </li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div><br><br><br>
        </div>
        <!--//about-->
        <!--work-experience-->
        <div id="work" class="work">
            <div class="container">
                <h3 class="title">Work Experience</h3>
                <div class="work-info"> 
                    <div class="col-md-6 work-left"> 
                        <h4>2016 - Till date </h4>
                    </div>
                    <div class="col-md-6 work-right"> 
                        <h5><span class="glyphicon glyphicon-briefcase"> </span>Aara Tech Pvt Ltd</h5>
                        <p>Developing a Framework for creating new application template in ionic. Maintain the Ionic Components and Creating Business Application through our framework using GOLang </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="work-info"> 
                    <div class="col-md-6 work-right work-right2"> 
                        <h4> 2016 </h4>
                    </div>
                    <div class="col-md-6 work-left work-left2"> 
                        <h5> VIT consultancy Pvt Ltd <span class="glyphicon glyphicon-briefcase"> </span></h5>
                        <p>Working as a team, to develop frame work in GoLang programing using MongoDB and MySQL. Design Ionic templates. Design the architecture for the Framework. </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="work-info"> 
                    <div class="col-md-6 work-left"> 
                        <h4>2015 - 2016  </h4>
                    </div>
                    <div class="col-md-6 work-right"> 
                        <h5><span class="glyphicon glyphicon-briefcase"> </span> Esquire Systems Pvt Ltd</h5>
                        <p>Hybird Mobile Application development using GOLang, Angular JS, MongoDB, MySQL. And we also develop wesite for our own organisatioin using Bootstrap. Developed one restaurant based Application in Mobile Frist Server using Angular JS  </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!--//work-experience-->
        <!--education-->
        <div id="education" class="education">
            <div class="container">
                <h3 class="title">Education</h3>
                <div class="work-info"> 
                    <div class="col-md-6 work-left"> 
                        <button type="button" class="btn per-btn-round-left">84.59%</button>
                        <h4>MCA - 2014</h4>
                    </div>
                    <div class="col-md-6 work-right"> 
                        <h5><span class="glyphicon glyphicon-education"> </span>Sarah Tucker College (Autonomous)</h5>
                        <p>Tirunelveli - 627002 </p>
                        <p>Representative of a class. Participated and won the prizes for Software Developing & Debugging, Web development in intercollegiate competitions. Learning Android Coding. </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="work-info"> 
                    <div class="col-md-6 work-right work-right2"> 
                        <h4>B.Sc Computer Science - 2011</h4>
                        <button type="button" class="btn per-btn-round-right">77.40%</button>
                    </div>
                    <div class="col-md-6 work-left work-left2"> 
                        <h5> Rose Mary College Arts and Science<span class="glyphicon glyphicon-education"></span></h5>
                        <p>Tirunelveli - 627012 </p>
                        <p>Participated and won the prizes for Software Developing & Debugging, Web development in intercollegiate competitions. </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="work-info"> 
                    <div class="col-md-6 work-left"> 
                        <button type="button" class="btn per-btn-round-left">67.25%</button>
                        <h4>Higher Secondary Education - 2008</h4>
                    </div>
                    <div class="col-md-6 work-right"> 
                        <h5><span class="glyphicon glyphicon-education"> </span> Municipal Girls Higher Secondary School</h5>
                        <p>Tirunelveli - 627001 </p>
                        <p>Member in Green crops</p>
                        <p>Won prizes in drawing competition</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="work-info"> 
                    <div class="col-md-6 work-right work-right2"> 
                        <h4>Secondary School Leaving Certification - 2016</h4>
                        <button type="button" class="btn per-btn-round-right">75.6%</button>
                    </div>
                    <div class="col-md-6 work-left work-left2"> 
                        <h5> Municipal Girls Higher Secondary School<span class="glyphicon glyphicon-education"></span></h5>
                        <p>Tirunelveli - 627001 </p>
                        <p>Member in Green crops</p>
                        <p>Won prizes in drawing & Easy competition</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!--//education-->
        <!--skills-->
        <div id="skills" class="skills">
            <div class="container">
                <h3 class="title">Skills</h3><br><br>
                <div class="skills-info">
                    <div class="col-md-4 bar-grids">
                        <h6>GoLang  <span> 80% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 80%">
                            </div>
                        </div>
                        <h6>Java <span> 75% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 75%">
                            </div>
                        </div>
                        <h6>IBM Mobile Frist Server <span> 70% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 70%">
                            </div>
                        </div>
                        <h6>Android<span>70% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 70%">
                            </div>
                        </div>                      
                        <h6>Ionic <span> 70% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 70%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 bar-grids">
                        <h6>WEB DESIGN  <span> 75% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 75%">
                            </div>
                        </div>
                        <h6>UI DESIGN & DEVELOPER <span> 75% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 75%">
                            </div>
                        </div>
                        <h6>HTML/CSS/JQuery<span>90% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 90%">
                            </div>
                        </div>
                        <h6>BootStrap/AngularJS/JSon<span>70% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 70%">
                            </div>
                        </div>
                        <h6>PHOTOSHOP <span> 75% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 75%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 bar-grids">
                        <h6>Macro Media Flash <span> 70% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 70%">
                            </div>
                        </div>
                        <h6>MongoDB <span> 65% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 65%">
                            </div>
                        </div>
                        <h6>MySQL<span> 75% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 75%">
                            </div>
                        </div>
                        <h6>Oracle<span>80% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 80%">
                            </div>
                        </div>
                        <h6>SQLite<span> 60% </span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" style="width: 60%">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!--//skills-->
        <!--portfolio-->
        <div class="portfolio">
            <div id="projects" class="container">
                <h3 class="title wow zoomInLeft animated" data-wow-delay=".5s">My portfolio</h3>
                <div class="sap_tabs">          
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list wow fadeInUp animated" data-wow-delay=".7s">
                            <li class="resp-tab-item"><span>All</span></li>
                            <li class="resp-tab-item"><span>Html</span></li>
                            <li class="resp-tab-item"><span>Photoshop</span></li>
                            <li class="resp-tab-item"><span>Flash</span></li>                   
                        </ul>   
                        <div class="clearfix"> </div>   
                        <!--<div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content">
                                <div class="tab_img">
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g1.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid effect-sarah">
                                            <a href="images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g2.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g3.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g4.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g5.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g6.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g6.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g7.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g7.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g8.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g8.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g9.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g9.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content">
                                <div class="tab_img">
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g5.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g6.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g6.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g7.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g7.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content">
                                <div class="tab_img">
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g3.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g1.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g9.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g9.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content">
                                <div class="tab_img">
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g2.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g4.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="col-md-4 portfolio-grids">
                                        <div class="grid">
                                            <a href="images/g8.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                                <img src="images/g8.jpg" alt="" class="img-responsive" />
                                                <div class="figcaption">
                                                    <h3>My<span> Project</span></h3>
                                                    <p>Sarah likes to watch clouds. She's quite depressed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!--ResponsiveTabs-->
                <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true   // 100% fit in a container
                        });
                    });     
                </script>
                <!--//ResponsiveTabs-->
                <!-- swipe box js -->
                <script src="js/jquery.swipebox.min.js"></script> 
                    <script type="text/javascript">
                        jQuery(function($) {
                            $(".swipebox").swipebox();
                        });
                </script>
                <!-- //swipe box js -->
            </div>
        </div>
        <!--//portfolio-->
        <!--Hobbies-->
        <div class="welcome hobbies" id="hobbies">
            <div class="container">
                <h3 class="title">Hobbies</h3><br><br><br><br><br>
                <div class="hobbies-row">
                    <div class="balloon" data-toggle="tooltip" data-placement="bottom" data-original-title="Photography"><span class="bimg" id="hby1"><img src="images/hobbies/hobby1.PNG" class="himg"></span></div>

                    <div class="balloon"  data-toggle="tooltip" data-placement="bottom" data-original-title="Bike Riding"><span class="bimg" id="hby2"><img src="images/hobbies/hobby2.PNG" class="himg"></span></div>

                    <div class="balloon"  data-toggle="tooltip" data-placement="bottom" data-original-title="Coin Collections"><span class="bimg" id="hby3"><img src="images/hobbies/hobby3.PNG" class="himg"></span></div>

                    <div class="balloon"  data-toggle="tooltip" data-placement="bottom" data-original-title="Swimming"><span class="bimg" id="hby4"><img src="images/hobbies/hobby4.PNG" class="himg"></span></div>

                    <div class="balloon"  data-toggle="tooltip" data-placement="bottom" data-original-title="Renovation"><span class="bimg" id="hby5"><img src="images/hobbies/hobby5.PNG" class="himg"></span></div>

                    <div class="balloon"  data-toggle="tooltip" data-placement="bottom" data-original-title="Walking"><span class="bimg" id="hby6"><img src="images/hobbies/hobby6.PNG" class="himg"></span></div>
                </div><br><br><br><br><br>
            </div>
        </div>

        <style type="text/css">
                .tooltip.bottom{
                    background-color:transparent;
                    font-size: 20px;
                }
                .tooltip-inner{
                    background-color:transparent;
                    color: white;
                    font-family: 'Overlock', cursive;               
                }
                .tooltip.bottom .tooltip-arrow{

                    border-bottom:transparent;
                }
        </style>

        <script type="text/javascript">
                
        $(document).ready(function () {
          //Tooltip, activated by hover event
          $("body").tooltip({   
            selector: "[data-toggle='tooltip']",
            container: "body"
          })
          //Popover, activated by clicking
          .popover({
            selector: "[data-toggle='popover']",
            container: "body",
            html: true
          });          
        });
        </script>
        <!--//Hobbies-->
        <!--Cluster Details-->
        <div class="welcome cluster" id="cluster">
            <div class="container">
                <h3 class="title">Cluster</h3>
                <div class="cluster-row">
                </div>
            </div>
        </div>
        <!--//Cluster Details-->
        <!--contact -->
        <div class="welcome contact">
            <div class="container">
                <h3 class="title" id="contact">Contact</h3>
                <div class="contact-row">
                    <div class="col-md-6 contact-left">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.636103365664!2d80.2397173142117!3d12.995111117879473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267860cfea0a7%3A0x7056dbe5fe9d3dd4!2sKattabomman+St%2C+Kanagam%2C+Taramani%2C+Chennai%2C+Tamil+Nadu+600113!5e0!3m2!1sen!2sin!4v1470302316737" width="600" height="525" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!--satellite view-->
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.368424854252!2d80.24123647423191!3d12.994784633599867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267860cfc97db%3A0xd5ecf45e7922862f!2s38%2C+Kattabomman+St%2C+Kanagam%2C+Taramani%2C+Chennai%2C+Tamil+Nadu+600113!5e1!3m2!1sen!2sin!4v1469514854690" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                    </div>
                    <div class="col-md-6 contact-right">
                        <div class="address-left">
                            <p style="margin-top: -5px;"><span class="glyphicon glyphicon-map-marker"  aria-hidden="true"></span>  38/65 Kattabomman Street,</p>
                            <p style="margin-top: 2%;"><span aria-hidden="true"></span> Tharamani, Chennai - 600 113 </p>
                        </div>
                        <div class="address-right">
                            <p style="margin-left: -30px; margin-top: 1px;"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp; <a href="mailto:vanamca2014@gmail.com"> vanamca2014@gmail.com</a></p>
                            <p style="margin-left: -30px; margin-top: 2%;"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>&nbsp;&nbsp;  +91 95786 48825</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="contact-form">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="contactform">

                                <input class="name" name="name" type="text" value="<?php echo $nameDis;?>" placeholder="Name" required="" >
                                <input class="phone" name="phone" type="text" value="<?php echo $phoneDis;?>" placeholder="Mobile" required="">
                                <input class="email" name="email" type="text" value="<?php echo $emailDis;?>" placeholder="Email" required="">
                                <input class="subject" name="subject" type="text" value="<?php echo $subjectDis;?>" placeholder="Subject" required="">
                                <textarea name="message" placeholder="Message" required=""><?php echo $messageDis;?></textarea><!-- We can set value for textarea inbetween only bcz textarea tag doen't have value attribute-->

                                <br>                                
                                <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'>
                                <button type="button" onclick="javascript: refreshCaptcha();"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> </button>
                                <input id="captcha_code" name="captcha_code" type="text" placeholder="Enter the captcha" required="">


                                <button type="reset" onclick="this.contactform.reset()" class="btnimpress-reset btn" data-loading-text="<i class='fa fa-spinner fa-spin'></i>&nbsp;&nbsp;&nbsp;&nbsp;Reseting..."><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> RESET</button>&nbsp;
                                <button type="submit" name="Submit" onclick="return validate();" value="Submit" class="btnimpress btn" data-loading-text="<i class='fa fa-spinner fa-spin '></i>&nbsp;&nbsp;&nbsp;&nbsp;Processing..."><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SEND</button>
                                <!-- <button type="submit" name="Submit" onclick="return validate();" value="Submit" class="button1 btn btn-primary btn-lg " id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SEND</button> -->
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--//contact -->

        <!--Button Loading (reset and Sent Loading Onclick)-->
        <script type="text/javascript">
            $('.btnimpress').on('click', function() {

                var $btn = $(this);
                $btn.button('loading');
                // Then whatever you actually want to do i.e. submit form
                var frmvalidator  = new Validator("contactform");
                frmvalidator.addValidation("name","alphabetic_space","Name should in Alphabetic & space..."); 
                frmvalidator.addValidation("phone","num","Mobile Number Invalid"); 
                frmvalidator.addValidation("email","email","Please enter a valid email address"); 
                frmvalidator.addValidation("subject","minlen=3","Minimum Need Three Letters..."); 
                frmvalidator.addValidation("subject","maxlen=100","Maximum only twenty characters..."); 
                frmvalidator.addValidation("message","maxlen=500","Maximum one twenty characters..."); 
                // After that has finished, reset the button state using
                setTimeout(function () {
                    $btn.button('reset');
                }, 5000);
            });  

            $('.btnimpress-reset').on('click', function() {

                 var $btn = $(this);
                $btn.button('loading');
                // Then whatever you actually want to do i.e. submit form
                // After that has finished, reset the button state using
                setTimeout(function () {
                    $btn.button('reset');
                }, 1000);
            });             
        </script>
        <!--//Button Loading (reset and Sent Loading Onclick)-->


        <!-- Code for validating the contact form using validator class-->
        <script language="JavaScript">        
        
        </script>

                
        <!--smooth-scrolling-of-move-up-->
        <script type="text/javascript">
            $(document).ready(function() {
            
                var defaults = {

                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                };
                
                $().UItoTop({ easingType: 'easeOutQuart' });
                
            });
        </script>
        <!--//smooth-scrolling-of-move-up-->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>                         