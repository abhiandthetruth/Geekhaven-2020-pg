<?php
    
    if(isset($_GET['id'])){
      require "../../database/member_info.php";
      $id=pg_escape_string($connection,$_GET['id']);
      $wing_id = $id;
      $query = "SELECT * FROM wings WHERE wing_id='$wing_id'";
      $result = pg_query($connection,$query);
      while($row = pg_fetch_assoc($result)){
          $wing = $row['wing'];
          $info = $row['info'];
          $logo = $row['logo'];
          $image = $row['image'];
          $wingName =$row['wing'];
          $link = $row['web_link'];
      }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Projects</title>
    <link rel="shortcut icon" href="../../images/gh.svg" type="image/png" />
    <link rel="stylesheet" href="projects.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Roboto:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-fixed-top"style="opacity: 0.9;">
        <div class="container-fullwidth">
          <a href="../index.html"><img class="nav-logo" src="../../images/gh.png"></a>
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" style="color: aliceblue !important;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../index.html">Home</a></li>
              <li><a href="#projects">Projects</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#blogs">Blogs</a></li>
              <li><a href="#footer">Contacts</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>


      <div class="container-fluid title" id="projects" style="margin-top:70px;">
        <p class="whiteToBlack">
          PR</span><span class="texta"  style="color: #13F7D2;">O</span>JECT
        </p>
        <hr class="line">
        

        <section class="container title-cards" style="margin-bottom:50px;">
        <?php
          $query = "SELECT * FROM Projects WHERE wing_id='$wing_id'";

          $result = pg_query($connection,$query);
          while($row = pg_fetch_assoc($result)){
            $pro_name = $row['project_name'];
            $pro_link = $row['project_link'];
            $code = $row['source_code_link'];
            $pro_des = $row['description'];
            $pro_image = $row['image'];
            $pro_blog_link = $row['blog_link'];
            ?>
          <div class="col-12 col-sm-12 col-md-12" style="margin-top: 100px;"> 
            <img src="../../images/circle.png" class="circle-card-1 c1" style="left: -90px;">
              <div class="col-md-12 card-title">
                <p class="whiteToBlack date">2020</p>
                <hr class="line">
                <h1 class="whiteToBlack"><?php echo $pro_name;?></h1>
                <div class="col-md-6">
                  <p class="card-text whiteToBlack"><?php echo $pro_des;?></p>
                  <?php echo"
                  <a href='{$pro_link}'>";?>
                  <button class="btn btn-default col-md-6 card-btn">
                    <span class="blacktowhite">Link to the Project</span>
                  </button>
                  </a>
                </div>

              </div>
          </div>           
            <?php
          }          
        ?>


        </section>
    </div>


      <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
      <script>

        $(function () {
        $(document).scroll(function () {

            var $logo = $(".nav-logo");
            $logo.toggleClass('scroll-img', $(this).scrollTop() > 10);

            var $nav_links = $(".navbar-nav li a")
            var $bars = $(".fa-bars");

            if(localStorage.getItem("theme")=="0") //light mode
            {
                $logo.toggleClass('mode-change-color', $(this).scrollTop() > $logo.height());
                $bars.toggleClass('mode-change-color', $(this).scrollTop() > $logo.height());   
                $nav_links.toggleClass('link-change-color', $(this).scrollTop() > $logo.height()); 

                if (window.matchMedia('(max-width: 768px)').matches)
                {
                    $nav_links.toggleClass('link2-change-color', $(this).scrollTop() > $logo.height()); 
                }

            }

            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > 10);

        });
        });

        if(localStorage.getItem("theme")=="0"){

$(document.body).attr('style', 'background-color: white !important');
$(".margin-div-bottom").children('p').css('color','black'); 
$(".navbar-nav li a").css('color','#000000')
$('.slider').css('background-color','black');           
$('.sub-heading').attr('style','color: #0D9C85')
$('.intro-heading').css('color','black')
$('.main-heading').css('color','black')
$('.nav-logo').attr('src','../../images/gh.svg')
$('.texta').attr('style', 'color: #0D9C85')
$('.coordi-post').attr('style', 'color: #0D9C85')
$('.arrow-down').attr('style','color: #0D9C85')
$(".more").css('color','#0D9C75')
$('.whiteToBlack').attr('style', 'color: black')
$('.blacktowhite').attr('style', 'color: white')
$('.arrow').attr('src','images/arrow-light.png')
$('.fa-bars').css('color','#000000')
$('.design-card').attr('src','images/l5.png')
$('.cc-card').attr('src','images/l6.png')
$('.event-date').attr('style','background-color: #0D9C85; border-color: #0D9C85')
$('.card-title').attr('style','background:linear-gradient(90deg, #F2A3A3 50%, #FFFFFF 50%);box-shadow: 0 0 10px #ccc')
$('.card-2').attr('style','background:linear-gradient(90deg, #FFFFFF 50%, #BBB6F3 50%);box-shadow: 0 0 10px #ccc')   
$('.card-3').attr('style','background:linear-gradient(90deg, #EDBDF4 50%, #FFFFFF 50%);box-shadow: 0 0 10px #ccc')   

if (window.matchMedia('(max-width: 480px)').matches)
{
  $('.card-title').attr('style','background:linear-gradient(to bottom, #F2A3A3 50%, #FFFFFF 50%) !important;box-shadow: 0 0 10px #ccc')
  $('.card-2').attr('style','background:linear-gradient(to bottom, #BBB6F3 50%, #FFFFFF 50%) !important;box-shadow: 0 0 10px #ccc')   
  $('.card-3').attr('style','background:linear-gradient(to bottom, #EDBDF4 50%, #FFFFFF 50%) !important;box-shadow: 0 0 10px #ccc') 
}

$('.card-btn').attr('style','background-color: #0D9C85 !important; border-color: #0D9C85 !important')
$('.blogs h2').attr('style','color: #000000')
$('.blogs button').attr('style','background-color: #15C4A8; border-color: #15C4A8')
$('.blogs span').attr('style','color: #FFFFFF')
$('.contacts h2').attr('style','color: #000000')
$('.contacts a').attr('style','color: #15C4A8; border-color:#15C4A8')
$('.footer').attr('style','background-color: #E7E7E7')
$('.whiteToblackBg').attr('style', 'background-color: white')

}else{  

$(document.body).attr('style', 'background-color: #252628 !important');
$(".margin-div-bottom").children('p').css('color','white');
$(".navbar-nav li a").css('color','#13F7D2')
$('.sub-heading').attr('style','color: #13F7D2')
$('.intro-heading').css('color','white')
$('.main-heading').css('color','white')
$('.nav-logo').attr('src','../../images/gh.png')
$('.texta').attr('style', 'color: #13F7D2')
$('.coordi-post').attr('style', 'color: #13F7D2')
$('.arrow-down').attr('style','color: #13F7D2')
$(".more").css('color','#13F7D2')
$('.arrow').attr('src','../../images/arrow.png')
$('.fa-bars').css('color','#FFFFFF')
$('.slider').css('background-color','white');
$('.whiteToBlack').attr('style', 'color: white')
$('.blacktowhite').attr('style', 'color: black')
$('.event-date').attr('style','background-color: #13F7D2; border-color: #13F7D2')
$('.card-title').attr('style','background:linear-gradient(90deg, #d52b2b 50%, #27282b 50%);box-shadow: 0')
$('.card-2').attr('style','background:linear-gradient(90deg, #27282B 50%, #4C40D2 50%);box-shadow: 0')    
$('.card-3').attr('style','background:linear-gradient(90deg, #A823BD 50%, #27282B 50%);box-shadow: 0')  

if (window.matchMedia('(max-width: 480px)').matches)
{
  $('.card-title').attr('style','background:linear-gradient(to bottom, #d52b2b 50%, #27282b 50%) !important;box-shadow: 0 0 10px #ccc')
  $('.card-2').attr('style','background:linear-gradient(to bottom, #4c40d2 50%, #27282b 50%) !important;box-shadow: 0 0 10px #ccc')   
  $('.card-3').attr('style','background:linear-gradient(to bottom, #a823bd 50%, #27282b 50%) !important;box-shadow: 0 0 10px #ccc') 
}

$('.card-btn').attr('style','background-color: #13F7D2 !important; border-color: #13F7D2 !important')
$('.blogs h2').attr('style','color: #FFFFFF')
$('.blogs button').attr('style','background-color: #13F7D2; border-color: #13F7D2')
$('.blogs span').attr('style','color: #000000')
$('.contacts h2').attr('style','color: #FFFFFF')
$('.contacts a').attr('style','color: #13F7D2; border-color:#13F7D2')
$('.footer').attr('style','background-color: #1D1D1F')
$('.whiteToblackBg').attr('style', 'background-color: #252628 ')
} 

  </script>

</body>
</html>