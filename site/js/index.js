(function (){
  var imgURL = "";
  var xhttp = new XMLHttpRequest();
  var video = document.getElementById('video'),
  canvas = document.getElementById('canvas'),
  photo = document.getElementById('photo'),
  context = canvas.getContext('2d'),
  vendorUrl = window.URL || window.webkitURL;
  navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
                       navigator.msGetUserMedianavigator.oGetUserMedia;

  navigator.getUserMedia({
    video:true,
    audio:false
  }, function (stream){
    video.src = vendorUrl.createObjectURL(stream);
    video.play();
  }, function (err){
    //error handling
  });
  function saveimg()
  {
    imgURL = canvas.toDataURL();
    context.drawImage(video, 0, 0, 700, 400);
    photo.setAttribute("src", imgURL);
  }
  var jsondata = {'image':imgURL};
  document.getElementById('snap').addEventListener('click', saveimg);
  xhttp.open('GET', 'index.php', true);
  xhttp.send(jasondata);
})();
