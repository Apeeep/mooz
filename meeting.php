<?php
session_start();
include './config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zoom Meeting</title>
  <link rel="shortcut icon" href="./assets/img/Camera.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <style>
    body {
      background-color: #1a1a1a;
    }

    #card {
      height: 11em;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <div class="h-100">
    <div class="contentTop d-flex justify-content-between py-1" style="background-color: #f3f3f3">
      <div class="cTopLeft d-flex gap-2 ms-2">
        <img src="./assets/img/zoomWindow.svg" width="23" alt="Zoom">
        <p class="m-0">Zoom Meeting</p>
      </div>
      <div class="cTopRight d-flex align-items-center">
        <ul class="list-unstyled d-flex m-0">
          <li class="d-flex align-items-center px-4">
            <img class="topIcon" src="./assets/img/minWindow.svg" width="13" alt="topIcon">
          </li>
          <li class="d-flex align-items-center px-4">
            <img class="topIcon" src="./assets/img/maxWindow.svg" width="13" alt="topIcon">
          </li>
          <li class="d-flex align-items-center px-4">
            <img class="topIcon" src="./assets/img/closeWindow.svg" width="13" alt="topIcon">
          </li>
        </ul>
      </div>
    </div>
    <div class="contentBottom h-100">

      <!-- Navbar Top -->

      <div class="cBotTop d-flex justify-content-between p-2" style="color: #d3d3d3">
        <div class="cBTLeft d-flex gap-2">
          <span class="d-flex px-2 rounded-2" style="background-color: #212121; ">
            <img src="./assets/img/shield.svg" alt="shield" class="shield">
          </span>
          <div class="recording d-flex align-items-center">
            <span class="h-100 d-flex align-items-center rounded-start px-3 gap-3" style="background-color: #101010">
              <img class="recIcon" src="./assets/img/record.svg" alt="recIcon">
              <p class="m-0">Recording...</p>
            </span>
            <span class="h-100 d-flex rounded-end gap-4 px-3" style="background-color: #0c0c0c">
              <img src="./assets/img/pauseTop.svg" alt="recPause" class="recPause">
              <img src="./assets/img/stopTop.svg" alt="recStop" class="recStop">
            </span>
          </div>
        </div>
        <div class="cBTRight p-1 px-2 d-flex gap-1 rounded-2" style="background-color: #212121">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          <p class="m-0">View</p>
        </div>
      </div>

      <!-- Content Middle -->

      <div class="cBotMid d-flex justify-content-between align-items-center gap-2 h-100">
        <div class="cBMLeft h-100 d-flex align-items-center">
          <span class="px-4 position-relative d-flex align-items-center justify-content-center" style="background-color: #191919">
          
            <p class="m-3 position-absolute bottom-0" style="color: #808080">1/2</p>
          </span>
        </div>
        <div class="cBMMid d-flex flex-wrap justify-content-center gap-2">
          <?php
          $get = $connection->query("SELECT * FROM users");
          for ($i = 0; $i < 25 && ($userData = $get->fetch_assoc()); $i++) :
          ?>
            <div id="card" class="position-relative col-2" style="background-color: #222222;">
            <?php if (!empty($userData['users_img'])) : ?>
              <img src="./images/<?= $userData['users_img']; ?>" alt="<?= $userData['users_name']; ?>" class="w-100 h-100 object-fit-contain">
            <?php else : ?>
              <span class="d-flex w-100 h-100 align-items-center justify-content-center">
                <p class="m-0 px-5 fs-5 text-white text-center fw-bold align-items-center justify-content-center" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $userData['users_name']; ?></p>
              </span>
            <?php endif; ?>
              <span class="position-absolute bottom-0 start-0 p-1 pe-2 d-flex gap-1" style="background-color: rgb(45,45,45,.5); max-width: 80%;">
                <img src="./assets/img/muteMic.svg" alt="muteMic">
                <p class="m-0 text-white" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $userData['users_name']; ?></p>
              </span>
            </div>
          <?php endfor; ?>
        </div>
        <div class="cBMRight">

        </div>
      </div>

      <!-- Navbar Bottom -->

      <div class="cBotBottom fixed-bottom d-flex justify-content-between container-fluid" style="color: #a8a8a8">
        <div class="cBBLeft d-flex">
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/microphoneBottom.svg" height="50" alt="Microphone">
              <p class="m-0">Unmute</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/cameraBottom.svg" height="50" alt="Camera">
              <p class="m-0">Start Video</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
        </div>
        <div class="cBBMid d-flex">
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/securityBot.svg" height="50" alt="Security">
              <p class="m-0">Security</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <div class="d-flex position-relative">
                <img src="./assets/img/participantsBot.svg" height="50" alt="Participants" class="me-2">
                <?php $numRows = $get->num_rows;?>
                  <p class="m-0 mt-2 position-absolute end-0"><?php echo $numRows ?></p>
              </div>
              <p class="m-0">Participants</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/chatBot.svg" height="50" alt="Chat">
              <p class="m-0">Chat</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/shareBot.svg" height="50" alt="ShareScreen">
              <p class="m-0" style="color: #23d959">Share Screen</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/recordBot.svg" height="50" alt="Recording">
              <p class="m-0">Pause/Stop Recording</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/reactBot.svg" height="50" alt="Reactions">
              <p class="m-0">Reactions</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/appBot.svg" height="50" alt="Apps">
              <p class="m-0">Apps</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
          <div class="px-3 py-1 d-flex align-items-center gap-1">
            <span class="d-flex flex-column align-items-center">
              <img src="./assets/img/whiteBot.svg" height="50" alt="Whiteboards">
              <p class="m-0">Whiteboards</p>
            </span>
            <i class="fa-solid fa-angle-up mb-4"></i>
          </div>
        </div>
        <div class="cBBRight d-flex align-items-center">
          <a href="userslist.php" class="btn btn-danger text-white fw-bold px-4 rounded-3">End</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>