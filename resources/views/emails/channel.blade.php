<html>
  <head>
    <style>
    html, body {
      width: 100%;
      float: left;
      height: 100%;
      background: #0e919d;
      font-family: 'Montserrat', sans-serif;
      margin: 0px;
    }

    .wrapper {
      width: 60%;
      height: auto;
      float: left;
      margin: 40px 15%;
      padding: 80px;
      background: #fff;
      box-shadow: 1px 2px #0b7680;
    }

    .wrapper>.title {
      text-transform: uppercase;
      font-size: 32px;
      color: #12a802;
      float: left;
      margin-bottom: 20px;
    }
    .wrapper .body {
      width: 100%;
      float: left;
    }
    .wrapper .body .bg {
      background: url(../img/mail.jpeg);
      float: left;
      width: 100%;
      height: 400px;
      background-position: center;
    }
    .wrapper .body .title {
      font-size: 20px;
      float: left;
      width: 100%;
      text-align: center;
      color: #000;
      padding: 20px 0;
    }
    .wrapper .body .email {
      float: left;
      width: 100%;
      padding-bottom: 30px;
      font-size: 12px;
      font-weight: 300;
      text-align: justify;
    }
    .wrapper .body span[role="button"] {
      float: left;
      width: 100%;
      height: auto;
      text-align: center;

    }
    .wrapper .body span[role="button"] a{
      text-decoration: none;
      color: #fff;
      float: none;
      margin: 20px auto;
      width: auto;
      height: auto;
      padding: 10px 30px;
      background: #12a802;
      text-align: center;

    }
    </style>
    <meta charset="utf-8">
  </head>

  <body>
    <div class="wrapper">
        <span class="title">Helpdesk</span>
        <div class="body">
          <div class="bg"></div>
          <span class="title">Таньд шинэ асуулт ирсэн байна!!!</span>
          <span class="email">Таны <b>{{ $questionTitle }}</b> сувагт <b>{{ $answerUser }}</b> хэрэглэгчээс дараах асуулт ирсэн байна. Та дэлгэрэнгүй үзэхийг хүсвэл доорх хаягаар хандана уу?</span>
          <span role="button"><a href="/question-{{ $questionId }}">Дэлгэрэнгүй</a></span>
        </body>
    </div>
  </body>
</html>
