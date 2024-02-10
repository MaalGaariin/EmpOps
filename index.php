<?php
require 'assets/conn.php';
$select="SELECT * FROM employee";
$select_query=mysqli_query($conn,$select) or die(mysqli_error($conn));
$users=mysqli_num_rows($select_query);
  $tsalary = "SELECT SUM(salary) AS total_salary FROM employee";
$tsalary_query = mysqli_query($conn, $tsalary);
$ttt = mysqli_fetch_assoc($tsalary_query);
$totalSalary = $ttt['total_salary'];
echo'<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />

  <link rel="stylesheet" href="./Landing-Page/global.css" />
  <link rel="stylesheet" href="./Landing-Page/responsive.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Righteous:wght@400&display=swap" />
  <link rel="stylesheet" href="./Landing-Page/index.css" />
</head>

<body>
  <div class="main-frame">
    <main class="macbook-1">
      <header class="macbook-1-inner">
        <div class="empops-parent">
          <h3 class="empops" style="color:#0304bb; font-size:40px; font-weight:bold; text-shadow: 3px 3px 6px rgba(255,255,255, 0.8);">EMPOPS</h3>
          <div class="about-us-parent">
            <div class="frame-child" style="height: 90px;  width: 100px;  position: absolute;  margin: 0 !important;  top: 40px;  right: 0;  border-radius: 50%;  background: radial-gradient(circle, #9431AB, #ACA6F5, white);  filter: blur(4px); z-index:-1"></div>
            <div class="about-us"></div>
            <div class="features"></div>
            <div class="how-it-works"></div>
            <div class="contact-us"></div>
            <div class="f-a-qs-text">
              <div class="faqs"></div>
            </div>
            <button class="logo-and-text-frame" onclick="redirectToHome()">
              <div class="logo-and-text-frame-child"></div>
              <div class="sign-in">Get Started</div>
            </button>
          </div>
        </div>
      </header>
      <section class="rectangle-frames" style="z-index:0">
        <div class="header-frame">
          <div class="empower-text"></div>
          <div class="frame-parent">
            <div class="frame-wrapper">
              <div class="empops-group">
                <h1 class="empops1" style="color:Chocolate; text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.8);">EmpOps</h1>
                <div class="frame-child" style="height: 90px;  width: 100px;  position: absolute;  margin: 0 !important;  top: 46px;  right: 0;  border-radius: 50%;  background: radial-gradient(circle, #aa55bb, #9431AB, #ACA6F5, white);  filter: blur(4px); z-index:-1"></div>
              </div>
            </div>

            <div>
            <h1 class="empower-manage-optimize" style="color:white; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8); font-size:40px;">Empower, Manage, Optimize</h1></div>
            <div class="go-to-solution-for-seamless-em-parent">
              <h3 class="go-to-solution-for">
                Go-To solution for seamless employee management.
              </h3>
            </div>
          </div>
        </div>
      </section>
      <section class="macbook-1-child">
        <div class="frame-group">
          <div class="frame-container">
            <div class="frame-div">
              <div class="frame-parent1">
                <button class="rectangle-parent">
                  <div class="frame-inner"></div>
                  <div class="features1">Features</div>
                </button>
                <div class="frame-parent2">
                  <button class="rectangle-group"  onclick="redirectToHome()">
                    <div class="rectangle-div"></div>
                    <div class="login-to-your">Login To Your Account</div>
                  </button>
                  <div class="ellipse-div"></div>
                </div>
              </div>
              <div class="frame-wrapper1">
                <div class="frame-parent3">
                  <div class="rectangle-container">
                    <div class="frame-child1"></div>
                    <div class="frame-child2"></div>
                    <div class="rectangle-parent1">
                      <div class="frame-child3"></div>
                      <img class="logo1-30-0290-1-icon" loading="eager" alt="" src="./Landing-Page/side-img.png" />
                    </div>
                    <div class="frame-child4"></div>
                  </div>
                  <div class="rectangle-parent2">
                    <div class="frame-child5"></div>
                    <div class="current-emp-frame">
                      <div class="current-emp">
                        <b class="current-emp1">Current Emp.</b>
                        <b class="mil">'.$users.'</b>
                      </div>
                      <div class="current-emp2">
                        <b class="salary">Salary</b>';
                        if($totalSalary>1000){
                          $salary_indicator="K";
                        }elseif($totalSalary>1000000){
                          $salary_indicator="M";
                        }
                        echo'<b class="mil1">'.$totalSalary.$salary_indicator.'</b>
                      </div>
                    </div>
                    <button class="contact-us1">
                      <div class="contact-us-child"></div>
                      <b class="contact-us2">Contact Us</b>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="frame-parent4">
            <div class="frame-parent5">
              <div class="k-users-parent">
                <div class="k-users">
                  <div class="k-users-child"></div>
                  <div class="k-parent">
                    <div class="k">'.$users.'</div>
                    <div class="users">';
                    if($users > 1){
                      $display_user="Users";
                    }else{
                      $display_user="User";
                    }
                      echo'<div class="users1">'.$display_user.'</div>
                    </div>
                  </div>
                  <div class="line-separator"></div>
                </div>
                <div class="offices">
                  <div class="m">'.$totalSalary.'</div>
                  <div class="salary1">Salary</div>
                </div>
              </div>
              <div class="salary-text"></div>
            </div>
            <div class="line">
              <div class="div">1</div>
              <div class="offices1">Offices</div>
            </div>
          </div>
        </div>
      </section>
      <div class="macbook-1-inner1">
        <div class="frame-child6"></div>
      </div>
      <div class="ellipse-parent">
        <div class="frame-child7"></div>
        <div class="wrapper-logo1-6-224747-1">
          <img class="logo1-6-224747-1-icon" loading="eager" alt="" src="./Landing-Page/empops-logo.png" />
        </div>
      </div>
    </main>
  </div>


  <!-- Login Button Redirect -->
  <script>
      function redirectToHome() {
          window.location.href = "./login.php";
      }
  </script>

</body>

</html>';
?>