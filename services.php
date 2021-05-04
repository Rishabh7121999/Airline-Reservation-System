<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"> <!-- device-width is used for responsive website -->
    <meta name="description" content="Affordable and professionl airlines">
    <meta name="keywords" content="airines, professional airlines">
    <meta name="author" content="Rishabh Singh">
    <title>RC Trips | Services</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <!-- Header section starts -->
    <header>
      <div class="container"> <!-- To contain elements -->
        <div id="branding">
          <h1><span class="highlight">RC</span> Trips</h1>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="About.php">About</a></li>
            <li class="current"><a href="Services.php">Services</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- Header section ends -->

    <!-- newsletter section -->
    <section id="newsletter">
      <div class="container">
        <h1>Subscribe To Our Newsleter</h1>
        <form> <!-- form wont work because there's no backend -->
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">Subscribe</button>
        </form>
        </div>
    </section>
    <!-- newsletter section -->

    <!-- box section starts -->
    <section id="main">
       <div class="container">
         <article id="main-col">
           <h1 class="page-title">Domestic FLights</h1>
          <ul id="services">
            <li>
              <h3 align="center">Economy class</h3>
              <p align="center">FLights all over India</p>
              <p align="center">Price : 2000rs-5000rs</p>
            </li>
            <li>
              <h3 align="center">Business class</h3>
              <p align="center">FLights all over India</p>
              <p align="center">Price : 4000rs-7500rs</p>
            </li>
          </ul>
         </article>

          <aside id="sidebar">
           <div class="dark">
              <h3 align="center">To book your tickets,</h3>
              <p align="center"> <a href ="booking.php" style="color:#fff; text-decoration:none;">Click here</a></p>
           </div>
         </aside>
       </div>
    </section>
    <!-- box section ends -->

    <footer>
      <p>RC Trips, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
