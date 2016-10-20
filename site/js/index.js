(function (){
  var imgURL = "Nothing passed";
  var xhttp = new XMLHttpRequest();
  var video = document.getElementById('video'),
  canvas = document.getElementById('canvas'),
  photo = document.getElementById('photo'),
  context = canvas.getContext('2d'),
  vendorUrl = window.URL || window.webkitURL;
  navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
                       navigator.msGetUserMedianavigator.oGetUserMedia;

  /*navigator.getUserMedia({
    video:true,
    audio:false
  }, function (stream){
    video.src = vendorUrl.createObjectURL(stream);
    video.play();
  }, function (err){
    //error handling
  });*/
  function saveimg()
  {
    imgURL = canvas.toDataURL('image/png');
    context.drawImage(video, 0, 0, 700, 400);
    photo.setAttribute("src", imgURL);

    var data = "data="+imgURL;
    xhttp.open("POST", "ajax.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function()
    {
        if (xhttp.readyState == XMLHttpRequest.DONE)
        {
            if(xhttp.status == 200)
            {
              var data = JSON.parse(xhttp.responseText);
              document.getElementById('pic').setAttribute('src', data.image);
              console.log('Response: ' + data.image);
            }
            else
            {
                console.log('Error: ' + xhttp.statusText )
            }
        }
    };
    xhttp.send(data);
  }
  document.getElementById('snap').addEventListener('click', saveimg);


})();
