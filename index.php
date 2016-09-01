<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "polina.nenchev@gmail.com;

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css" media="screen" title="no title" charset="utf-8">
  <!--  add the rest of the links-->
    <link href='https://fonts.google.com/specimen/Sans' rel='stylesheet' type='text/css'>
    <title>Polina Nenchev</title>
  </head>
  <body>

    <div class="content" id="content1">
      <header class="clearfix">
        <h1 id="name1">Polina Nenchev</h1>
        <h3 id="header-intro">Web & Mobile Developer in Portland, Oregon</h3>
        <div class="menu">
          <ul class="nav-bar">
            <li><a href="#interest">Work/Interests</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </header>
    </div>

    <div class="content" id="about">
      <div id="bio">
        <h4 class="page-title"></h4>
        <img class="picture" src="img/polina.png">
        <p class="bio-p">  As a Junior Web Developer from Portland, OR who was born and raised in an Eastern European Country 12 years ago, I have always been passionate about numbers, stats and how they impact people's lives. Previously, I was a case manager for the State of Oregon where I managed a highly secured DHS code system before I made the leap to become a creator. I am constantly building, editing and re-formating programs to enrich lives. I recently graduated from Epicodus where I focused on the Java/Android track where I gained skills such as intital creations of applications all the way to integration and unit testing. As a learning extraordinaire I am always on the lookout to improve my skills and gain some new ones.</p>
      </div>
    </div>

<!-- Work/Interests -->
    <div class="content" id="interest">
        <h4 class="page-title">Work/Interests</h4>
        <p>Some of my interests are my family and my development career. I enjoy learnig new programming languages, going to meet ups, and developing personal projects in my free time. Taking the track Java/Javascript/Android made me more detailed-oriented and open more interests for me in this field. On the personal side, my family is my everything. If I had to describe myself with a few words. <strong> "Loving mother and wife, passionate developer, and experimental cooker"</strong></p>
    </div>
<!-- PROJECTS -->
    <div class="content" id="projects">
        <p><a id="dev_projects" href="https://github.com/polina13">
            <h4 class="page-title">Projects
               <img src="img/GitHub-Mark-32px.png">
            </h4></a></p>

      <div class="row" id="project-img">
          <div class="col-md-4"><h2>Coffee Lovers</h2>
              <h4>Click on picture to learn more about the project</h4>
              <a href="https://github.com/polina13/CoffeeShop.git"><img src="img/coffee.png"></a>
          </div>
          <div class="col-md-4"><h2>FitMap</h2>
              <h4>Click on picture to learn more about the project</h4>
              <a href="https://github.com/polina13/FitMap.git"><img src="img/fitMap.png"></a>
          </div>
          <div class="col-md-4"><h2>Q&A Message Board</h2>
              <h4>Click on picture to learn more about the project</h4>
              <!--  HOW TO ADD PARAGRAPH THAT WILL BE WRAPPED ?? Ask-->
              <a href="https://github.com/polina13/Q-A-MessageBlog.git"><img src="img/q&a.png"></a>
          </div>
          <!--  Meal Tracker -->
          <div class="col-md-4"><h2>Meal Tracker</h2>
              <h4>Click on picture to learn more about the project</h4>
              <a href="https://github.com/polina13/mealTracker.git"><img src="img/q&a.png"></a>
          </div>

      </div>
    </div>

    <div class="content" id="contact">
      <h4 class="page-title">Contact</h4>
      <div id="form-div">
        <div class="form-styling">
          <h2>Get in Contact. Just fill this!</h2>
          <div id="messages"></div>
          <form id="ajax-contact">
            <form id="ajax-contact" method="post" action="index.php">
              <input type="text" name="name" id="name" placeholder="Name" required></input>
              <input type="email" name="email" id="email" placeholder="Email" required></input>
              <textarea placeholder="Message" id="message" required></textarea>
              <button id="submit-button" type="submit">Submit</button>
            </form>
        </div>
      </div>
      <div id="contact-info">
        <h4>polina.nenchev@gmail.com</h4>
        <p>
          <a href="https://github.com/polina13"><img src="img/GitHub-Mark-32px.png" > </a>
          <a href="https://www.linkedin.com/in/polinanenchev"><img  src="img/In-Black-34px-R.png"></a>
        </p>
      </div>
    </div>
    <div class="content" id="footer" data-stellar-background-ratio="1">
        <p>&#169;2016 Polina Nenchev </p>
    </div>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
