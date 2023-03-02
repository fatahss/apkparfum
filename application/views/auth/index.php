<!DOCTYPE html>
<html>
<head>

<title>Baba Parfum</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>


</head>
<body id="myPage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
    <i class="fa fa-remove"></i>
  </a>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
  <a href="#" class="w3-bar-item w3-button">Link 5</a>
</nav>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-white"><i class="fa fa-home w3-margin-right"></i>Baba Parfum</a>
  <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Product</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    
  <a href="auth/login" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Login</a>
  <a href="auth/register" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sign Up</a>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#work" class="w3-bar-item w3-button">Product</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="auth/login" class="w3-bar-item w3-button">Login</a>
    <a href="auth/register" class="w3-bar-item w3-button">Sign Up</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="<?= base_url('assets/'); ?>img/sailboat.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
 
</div>

<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Oh snap! We just showed you a modal..</h4>
      <h5>Because we can <i class="fa fa-smile-o"></i></h5>
    </header>
    <div class="w3-container">
      <p>Cool huh? Ok, enough teasing around..</p>
    </div>
    <footer class="w3-container w3-teal">
      <p>Modal footer</p>
    </footer>
  </div>
</div>

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">

<div class="w3-row"><br>

<div class="w3- center">
  <img type = "image" src="<?= base_url('assets/img/profile/')  ?>default.jpg"  style="width:15%" class="w3-circle w3-hover-opacity" href="<?= base_url('auth/idcard/') . 60 ?> ">
  <h3 >Johnny Walker</h3>
  <p>Founder Bekasi</p>
  <a class="text text-info" href="<?= base_url('auth/idcard/') . 60 ?> ">Lihat Profil</a>

</div>



</div>
</div>

<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<h2 style="text-align:center">Product Card</h2>

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
    <?php $i = 1; ?>
<?php $no = $this->uri->segment('3') + 1; 
foreach ($parfum as $r) : ?>
  
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0">Today's Combo Offer</p>
            <div
              class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
              style="width: 35px; height: 35px;">
            </div>
          </div>
          <img src="<?= base_url('images/')  ?>bababotol.jpg"
            class="card-img-top" alt="Laptop" />
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="text-dark mb-0"><?= $r->nama_parfum ?></h5>
            </div>

            <div class="d-flex justify-content-between mb-3">
              <h5 class="text-dark mb-0">Rp. <?= number_format($r->harga_direct,0,',',',')?></h5>
            </div>

       

           
          </div>
        </div>
      </div>
      <?php $i++; ?>
 <?php endforeach; ?>
 
 <div class="text-center">
 <?php 
	echo $this->pagination->create_links();
	?>
  </div>
    </div>
  </div>
</section>

<div class="card-body">
           <!-- Posts List -->
           <table class="table table-borderd" id='postsList'>
             <thead>
              <tr>
                <th>S.no</th>
                <th>Title</th>
              </tr>
             </thead>
             <tbody></tbody>
           </table>
           
           <!-- Paginate -->
           <div id='pagination'></div>
      </div>
 






</div>

<!-- Container -->




<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="<?= base_url('assets/'); ?>img/map.jpg" class="w3-image w3-greyscale-min" style="width:100%;">

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "300px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}

// Close side navigation
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>
   $(document).ready(function(){
 
     $('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       loadPagination(pageno);
     });
 
     loadPagination(0);
 
     function loadPagination(pagno){
       $.ajax({
         url: '/auth/loadRecord/'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
            $('#pagination').html(response.pagination);
            createTable(response.result,response.row);
         }
       });
     }
 
     function createTable(result,sno){
       sno = Number(sno);
       $('#postsList tbody').empty();
       for(index in result){
          var id = result[index].id;
          var title = result[index].nama_parfum;
          var content = result[index].kategori_id;
          content = content.substr(0, 60) + " ...";
          var link = result[index].kategori_id;
          sno+=1;
 
          var tr = "<tr>";
          tr += "<td>"+ sno +"</td>";
          tr += "<td><a href='"+ link +"' target='_blank' >"+ title +"</a></td>";
          tr += "</tr>";
          $('#postsList tbody').append(tr);
  
        }
      }
       
    });
    </script>

</body>
</html>
