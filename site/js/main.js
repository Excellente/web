(function (){
  var video = document.getElementById('video'),
  canvas = document.getElementById('canvas'),
  context = canvas.getContext('2d'),
  vendorUrl = window.URL || window.webkitURL;
  navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia
                       navigator.mozGetUserMedia || navigator.msGetUserMedia
                       navigator.oGetUserMedia;

  navigator.getUserMedia({
    video:true,
    audio:false
  }, function (stream){
    video.src = vendorUrl.createObjectURL(stream);
    video.play();
  }, function (err){
    //
  });

  document.getElementById('snapshot').addEventListener('click', function() {
    context.drawImage(video, 0, 0, 700, 400);
  });
})();
