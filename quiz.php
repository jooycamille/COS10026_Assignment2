<!DOCTYPE html>
<html lang="en">

<head>
      <title>Voice Technology | Quiz</title>
      <meta charset="utf-8">
      <meta name="description" content="Voice Technology">
      <meta name="author" content="Joy, Nelson, Uzman, Tom, Minh">
      <!-- Viewport set to scale 1.0 -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- References to external CSS files-->
      <link rel="stylesheet" href="styles/style.css">

      <!-- References to external fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <!-- Sigmar Once font -->
      <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">
      <!-- Yanone Kaffeesatz font -->
      <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Yanone+Kaffeesatz:wght@600&display=swap"
            rel="stylesheet">
      <!-- Roboto font-->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
      <!-- Exo font -->
      <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

      <!-- References to external responsive CSS file -->
      <link rel="stylesheet" href="styles/responsive.css" media="screen and (max-width: 1024px)">
</head>

<body class="quiz_body">

    <!-- ########## Navigation Section ########## -->
	<?php include 'header.inc'; ?>

      <!-- Content -->
      <article class="quiz_content">
            <form action="markquiz.php" method="post" novalidate = "novalidate">
                  <fieldset id="idsec">
                        <legend class="f_section"> Registration </legend>
                        <h2>Please enter the details below</h2>
                        <p>
                              First Name:
                              <input type="text" id="fname" name="fname" maxlength="30" placeholder="Enter First Name"
                                    pattern="^[a-zA-z_- ]+$" required="required">
                        </p>
                        <p>
                              Last name:
                              <input type="text" id="lname" name="lname" maxlength="30" placeholder="Enter Last Name"
                                    pattern="^[a-zA-z_- ]+$" required="required">
                        </p>
                        <!-- ^[a-zA-z_- ]+$ input pattern allows them to only allow alpha, hyphen and spaces when filling in the form -->
                        <p>
                              Student No:
                              <input type="text" id="studentid" name="studentid" placeholder=" Enter Student number"
                                    required="required" size="30" pattern="\d{7,10}">
                        </p>
                  </fieldset>

                  <fieldset class="q_sect">
                        <legend class="f_section"> Read through our topic page if you haven't already, then answer the following questions. Good Luck! </legend>
                        <p>
                              <strong><em> Please click on the navigation below to display the questions</em></strong>
                        </p>

                        <div class="quiz_nav" id="quiznav">
                              <a href="#quest_1">Question 1</a>
                              <a href="#quest_2">Question 2</a>
                              <a href="#quest_3">Question 3</a>
                              <a href="#quest_4">Question 4</a>
                              <a href="#quest_5">Question 5</a>
                        </div>

                        <article id="quest_1">
                              <h3>Question 1</h3>
                              <p>
                                    <label for="q1">What is another name for <strong>Voice Technology</strong>? </label>
                                    <br />
                                    <input type="text" id="q1" name="q1" placeholder="Enter a Voice Technology"
                                          required="required" pattern="^[a-zA-z_- ]+$" maxlength="30">
                              </p>
                        </article>

                        <article id="quest_2">
                              <h3>Question 2:</h3>
                              <p>
                                    What was the name given to the <em>first software program</em> used in Voice
                                    Technology?
                              </p>
                              <p id="q2">
                                    <label class="q2" for="q2a"><input type="radio" id="q2a" name="q2" value="alexa">
                                          Alexa </label>
                                    <label class="q2" for="q2b"><input type="radio" id="q2b" name="q2" value="siri">
                                          Siri </label>
                                    <label class="q2" for="q2c"><input type="radio" id="q2c" name="q2" value="cortana">
                                          Cortana </label>
                                    <label class="q2" for="q2d"><input type="radio" id="q2d" name="q2" value="audrey"
                                                required="required"> Audrey </label>
                              </p>
                        </article>

                        <article id="quest_3">
                              <h3>Question 3:</h3>
                              <p>
                                    Which of the following are real-world examples of Voice Technology?
                              </p>
                              <p id="q3">
                                    <label class="q3" for="applesiri"><input type="checkbox" id="applesiri" name="q3"
                                                value="applesiri"> Apple Siri </label>
                                    <label class="q3" for="amazon"><input type="checkbox" id="amazon" name="q3"
                                                value="amazon"> Amazon Alexa </label>
                                    <label class="q3" for="google"><input type="checkbox" id="google" name="q3"
                                                value="google"> Google Assistant </label>
                                    <label class="q3" for="dragon"><input type="checkbox" id="dragon" name="q3"
                                                value="dragon"> Dragon Professional </label>
                              </p>
                        </article>

                        <article id="quest_4">
                              <h3>Question 4:</h3>
                              <p>
                                    <label for="q4">Which of these catagories is Voice Technology related to?</label>
                                    <br />
                                    <select name="q4" id="q4" name="q4" required="required">
                                          <option value="" disabled selected> Please Select </option>
                                          <option value="civil"> Civil Engineering </option>
                                          <option value="bio"> Biometrics </option>
                                          <option value="politics"> Politics </option>
                                    </select>
                              </p>
                        </article>

                        <article id="quest_5">
                              <h3>Question 5:</h3>
                              <p class="q5">
                                    <label for="q5d">What are some of the benefits of Web Voice
                                          Technology?</label><br />
                                    <textarea id="q5d" name="q5" placeholder="Please answer here" rows="6" cols="50"></textarea>
                              </p>
                        </article>

                  </fieldset>

                  <p class="submitbtn">
                        <input type="submit" value="Finish Quiz">
                  </p>

            </form>
      </article>

      <?php include 'footer.inc'; ?>
</body>

</html>
