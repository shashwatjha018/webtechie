<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0" >
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Live Editor</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
  .all-content {
  padding-top:100px;
  padding-right:18%;
  padding-left:18%;
  }
  .editor textarea{
  width: 30%;
  margin: 10px;
  height: 200px;
  background-color: black;
  color: beige;
  padding: 10px;
}
.editor iframe{
  width: 800px;
  height: 300px;
  color: black;
  padding: 20px;
  background-color: rgb(247, 245, 244);
  margin-bottom: 60px;
  border: 2px solid #F5A7A7;
  border-radius: 5%;
}

.editor h6{
  margin: 40px;
  font-size: 18px;
  color: rgb(247, 245, 244);
}

.editor table{
  width: 100%;
  font-size: 26px;
  align-items: center;
  text-align: center;
  margin-bottom: 20px;
  margin-top: 60px;

}

.editor table td{  
  width:300px;
  border: 2px solid #F5A7A7;
  border-radius: 20%;
  color:white;
}

.editor p{
  width:300px;
  border: 2px solid #F5A7A7;
  border-radius: 20%;
  color:rgb(247, 245, 244);
  margin:20px;
  font-size: 24px;
}
.team h1{
    font-size: 40px;
    
    color:#F5A7A7;
}
        </style>

    </head>
    <body>
  <?php 
  include('navmain.php');
  ?>
  <div class="all-content">
        <center>
        <div class="team">
            <h1>LIVE EDITORS</h1>
        </div>
        </center>
          <center>
          <div class="editor">
              <h6>Wanna make learning more fun ?<br><br>Try doing it yourself !</h6>
              <table>
                  <tr>
                      <td>HTML Code</td>
                      <td>CSS Code</td>
                      <td>JS Code</td>
                  </tr>
              </table>
              <textarea id="html-code"></textarea>
              <textarea id="css-code"></textarea>
              <textarea id="js-code"></textarea><br>
              <P>OUTPUT</P>
              <iframe id="output"></iframe>
          </div>
          </center>
            <div class="clr"></div>
            </div>
        </div>
        <?php
    include('footer.php');
    ?>
    </body>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function run() {
            let htmlCode = document.querySelector(".editor #html-code").value;
            let cssCode = "<style>"+document.querySelector(".editor #css-code").value+"</style>";
            let jsCode = document.querySelector(".editor #js-code").value;
            let output = document.querySelector(".editor #output");
            //console.log(htmlCode,cssCode,jsCode,output);
            output.contentDocument.body.innerHTML = htmlCode+cssCode;
            output.contentWindow.eval(jsCode);
        }
        document.querySelector(".editor #html-code").addEventListener("keyup",run);
        document.querySelector(".editor #css-code").addEventListener("keyup",run);
        document.querySelector(".editor #js-code").addEventListener("keyup",run);
    </script>
    <script src="../js/script-d.js"></script>
</html>