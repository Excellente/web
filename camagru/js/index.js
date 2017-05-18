var xhttp = new XMLHttpRequest();
var l_tab = document.getElementById('layout');

function disappear(element)
{
  element.style.display = "none";
}

document.querySelector('#close').addEventListener('click', function ()
{
  document.getElementById('comment').style.display = "none";
});

document.querySelector('#like').addEventListener('click', function ()
{
  var data = "hello";
  xhttp.open("POST", "likeHandle.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function()
  {
    if (xhttp.readyState == XMLHttpRequest.DONE)
    {
        if(xhttp.status == 200)
        {
          var len = 0;
          var message = JSON.parse(xhttp.responseText);
          if (message.error === undefined)
          {
            alert('iam signed in');
          }
          else {
            document.getElementById('comment').style.display = "none";
            var ERR_DIV = document.getElementById('error');
            var ERR_DIV_CHILD = document.getElementById('text');
            ERR_DIV.style.display = "block";
            ERR_DIV_CHILD.innerHTML = message.error;
            console.log('Response: ' + message.error);
          }
        }
    }
    else
    {
        console.log('Error: ' + xhttp.statusText);
    }
  }
  xhttp.send(data);
});

function comment(element)
{
  var img_id = element.id;
  var xhttp = new XMLHttpRequest();
  var data = "img_id="+img_id;
  document.getElementById('to-comment').setAttribute('src', element.src);
  document.getElementById('comment').style.display = 'block';
  xhttp.open("POST", "viewed.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function()
  {
      if (xhttp.readyState == XMLHttpRequest.DONE)
      {
          if(xhttp.status == 200)
          {
            var data = JSON.parse(xhttp.responseText);
            console.log(data);
          }
          else
          {
              console.log('Error: ' + xhttp.statusText);
          }
      }
  };
  xhttp.send(data);
}

function loadGallery()
{
  var data = "hello";
  xhttp.open("POST", "galleryHandle.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function()
  {
      if (xhttp.readyState == XMLHttpRequest.DONE)
      {
          if(xhttp.status == 200)
          {
            var len = 0;
            var data = JSON.parse(xhttp.responseText);
            var t_row = document.createElement('tr');
            len = data.rows;
            for (var i = 1; i <= len; i++)
            {
              var image = document.createElement('img');
              var t_dat = document.createElement('td');
              image.setAttribute('src', data.data[i - 1].image);
              image.setAttribute('id', data.data[i - 1].image_id);
              image.setAttribute('onclick', 'comment(this)');
              image.style.width = "80";
              image.style.height = "60";
              l_tab.appendChild(t_row);
              t_row.appendChild(t_dat);
              t_dat.appendChild(image);
              if (i % 3 == 0)
              {
                t_row = document.createElement('tr');
              }
          }
          console.log('Response: ' + xhttp.responseText);
        }
          else
          {
              console.log('Error: ' + xhttp.statusText);
          }
      }
  };
  xhttp.send(data);
}

function close()
{
  alert("button clicked");
  document.getElementById('comment');
}

function linkOnclick(element)
{
  var data = "hello";
  xhttp.open("POST", "loginHandle.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function()
  {
      if (xhttp.readyState == XMLHttpRequest.DONE)
      {
          if(xhttp.status == 200)
          {
            var data = JSON.parse(xhttp.responseText);
            if (data.login === undefined)
            {
              var message = JSON.parse(xhttp.responseText).error;
              var ERR_DIV = document.getElementById('error');
              var ERR_DIV_CHILD = document.getElementById('text');
              ERR_DIV.style.display = "block";
              ERR_DIV_CHILD.innerHTML = message;
              console.log('Response: ' + message);
            }
            else
            {
              element.setAttribute('href', 'edit.php');
              window.location = "edit.php";
            }
          }
          else
          {
              console.log('Error: ' + xhttp.statusText);
          }
      }
  };
  xhttp.send(data);
}
