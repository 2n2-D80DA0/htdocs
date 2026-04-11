<?php 
require __DIR__."/../../../vendor/autoload.php";
use Core\Storage;
use Core\Session;
?>
<?php $a = "http://localhost/"?>
  <div id="header">

    <h1 id="logo"><a href="/home">MovieHunter</a></h1>
    <div class="social"> <span>FOLLOW US ON:</span>
    

      <ul>
        <li><a class="twitter" href="#">twitter</a></li>
        <li><a class="facebook" href="#">facebook</a></li>
        <li><a class="vimeo" href="#">vimeo</a></li>
        <li><a class="rss" href="#">rss</a></li>
      </ul>
        <?php
          echo (!Session::isConnect() ? 
            "<a href=\"". $a ."login\">LOGIN</a>
            <a href=\"". $a ."register\">REGISTER</a>"
          :
            "<a href=\"" . $a . "logout\">logout</a>"
          );
        ?>

        
    </div>
    <div id="navigation">
      <ul>
        <li><a href="/home">HOME</a></li>
        <li><a href="/now">NEWS</a></li>
        <li><a href="/">IN THEATERS</a></li>
        <li><a href="">COMING SOON</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="#">ADVERTISE</a></li>

      </ul>
    </div>
    <div id="sub-navigation">
      <ul>
        <li><a href="/home#">SHOW ALL</a></li>
        <li><a href="#">LATEST TRAILERS</a></li>
        <li><a href="/topRating">TOP RATED</a></li>
        <li><a href="/topComments">MOST COMMENTED</a></li>
      </ul>
      <div id="search">
        <form id="search-form">
          <input type="text" id="search-field" placeholder="Enter search">
          <button type="submit">GO</button>
        </form>
        <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
          e.preventDefault();

          let value = document.getElementById('search-field').value.trim();
          if (!value) return;
          window.location.href = '/search/' + encodeURIComponent(value);
        });

        </script>
      </div>
    </div>
  </div>