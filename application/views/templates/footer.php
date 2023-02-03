 <!-- Footer -->
 <footer class="sticky-footer " style="background: #FEECB5;">
    <div class="container my-auto">
       <div class="copyright text-center my-auto">
        <span>Copyright &copy; Baba Parfum <?= date('Y') ?> </span>
        </div>
    </div>
 </footer>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!--<a class="scroll-to-down rounded" href="#page-down">
        <i class="fas fa-angle-down"></i>
    </a>-->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda ingin Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap-select.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

   <!-- Page level plugins -->
   <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>





     <script>
                //$('.custom-file-input').on('change', function() {
                    //let fileName = $(this).val().split('\\').pop();
                    //$(this).next('.custom-file-label').addClass("selected").html(fileName);


                //});

                $(document).ready(function() {
  var i = 1;
  $('#btn_add').click(function() {
    if (i <= 7) {
      $('#dynamic_field').append('<div id="row' + i + '"><label" for="member_' + i + '">Member ' + i + '</label><input type="text" name="member_' + i + '" value=""></div>')
      i++;
      $('.btn_remove').removeClass('hidden');
    }
  });
  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    i--;
    $('#row' + $('#dynamic_field div').length).remove();
    if (i<=1) {
      $('.btn_remove').addClass('hidden');
    }
  });
});




                document.querySelector('.custom-file-input').addEventListener('change',function(e){
              var fileName = document.getElementById("myInput").files[0].name;
              var nextSibling = e.target.nextElementSibling
              nextSibling.innerText = fileName
            })

             



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });

                const searchButton = document.getElementById('search-button');
                const searchInput = document.getElementById('search-input');
                searchButton.addEventListener('click', () => {
                const inputValue = searchInput.value;
                alert(inputValue);
                });


                function tombolwa()
                {
                     location.href = "https://wa.me/6282295773985";
                } 

                // Toggle the side navigation
                $("#sidenavToggler").click(function(e) {
                    e.preventDefault();
                    $("body").toggleClass("sidenav-toggled");
                    $(".navbar-sidenav").toggleClass("sidenav-not-toggled");
                    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
                    $(".navbar-sidenav .nav-link-collapseLink").addClass("collapsed");
                    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
                });


                $(function() {
                $(this).bind("contextmenu", function(e) {
                e.preventDefault();
                });
                });

                $(document).bind("contextmenu",function(e) {
                e.preventDefault();
                });

                document.onkeydown = function(e) {
                if(event.keyCode == 123) {
                return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
                return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
                return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
                return false;
                }
                }

                window.oncontextmenu = function () {
                return false;
                }
                $(document).keydown(function (event) {
                if (event.keyCode == 123) {
                return false;
                }
                else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
                return false;
                }
                });


                $(document).ready(function() {
              $(".search").keyup(function () {
                var searchTerm = $(".search").val();
                var listItem = $('.results tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
                
              $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
              });
                
                
              $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
              });

              $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
              });

              var Id = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(Id + ' item');

              if(Id == '0') {$('.no-result').show();}
                else {$('.no-result').hide();}
                      });
            });



            $(document).ready(function () {
              $('#dtHorizontalExample').DataTable({
                "scrollX": true
              });
              $('.dataTables_length').addClass('bs-select');
            });

            $(document).ready(function () {
              $('#dtBasicExample').DataTable();
              $('.dataTables_length').addClass('bs-select');
            });



  document.addEventListener('DOMContentLoaded', (e) => {
    document.querySelectorAll('#slide-out #side-menu li').forEach((menu)=>{
      menu.querySelectorAll('ul.sub-menu li').forEach((link)=>{
        var is_active = link.querySelector('a.collapsible-header').classList.contains('current-page');
        var collapseIcon = menu.querySelector('.rotate-icon');

        if (is_active && collapseIcon) {
          $(link).addClass('current-menu-item')
          $(link).parents('.collapsible-body').siblings().addClass('active')
          return false;
        }
      });
    });

    const setTransitionProperties = () => {
      const sidenav = document.getElementById('slide-out');
      const rotateIcons = sidenav.querySelectorAll('.rotate-icon');
      const collapse = sidenav.querySelectorAll('.collapsible-body');

      rotateIcons.forEach(icon => {
        icon.style.transitionProperty = 'transform'
      });

      collapse.forEach(collapse => {
        collapse.style.transitionProperty = 'height'
      });
    }

    setTimeout(setTransitionProperties, 1);
  });

  if(null!=document.getElementById("dpl-gtm-frontpage")){var element=document.getElementById("dpl-gtm-frontpage"),animate=new mdb.Animate(element,{animation:"fade-in",animationStart:"onLoad",animationDelay:"0",animationDuration:"1000"});animate.init()};



  function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }



  }
}


//Initialize with the list of symbols
<?php
$parfum = $this->db->get('parfum')->result_array();
?>
let names = ["BTC","XRP"]

//Find the input search box
let search = document.getElementById("searchCoin")

//Find every item inside the dropdown
let items = document.getElementsByClassName("dropdown-item")
function buildDropDown(values) {
    let contents = []
    for (let name of values) {
    contents.push('<input type="button" class="dropdown-item" type="button" value="' + name + '"/>')
    }
    $('#menuItems').append(contents.join(""))

    //Hide the row that shows no items were found
    $('#empty').hide()
}

//Capture the event when user types into the search box
window.addEventListener('input', function () {
    filter(search.value.trim().toLowerCase())
})

//For every word entered by the user, check if the symbol starts with that word
//If it does show the symbol, else hide it
function filter(word) {
    let length = items.length
    let collection = []
    let hidden = 0
    for (let i = 0; i < length; i++) {
    if (items[i].value.toLowerCase().startsWith(word)) {
        $(items[i]).show()
    }
    else {
        $(items[i]).hide()
        hidden++
    }
    }

    //If all items are hidden, show the empty view
    if (hidden === length) {
    $('#empty').show()
    }
    else {
    $('#empty').hide()
    }
}

//If the user clicks on any item, set the title of the button as the text of the item
$('#menuItems').on('click', '.dropdown-item', function(){
    $('#dropdown_coins').text($(this)[0].value)
    $("#dropdown_coins").dropdown('toggle');
})

buildDropDown(names)









            </script>

            <script type="text/javascript">
    function addData(el) {
    var html = '<input class="btn-danger" type="button" name="remove" id="remove" value="Remove"> ';
  var table = document.getElementById('list');
  var tr = table.insertRow();
  el.form.querySelectorAll('input,Select').forEach(function(el) {
    var cell = tr.appendChild(document.createElement('td'));
    cell.textContent = el.value;
  });
}
</script>


<script>
    function myFunction() {
  document.getElementById("demo").innerHTML = "Hello World";
  document.getElementById("")
  
}
    </script>

 <!--   
<script>
     (function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  $(".container-fluid").on('click', function(e) {
    if ($(".sidebar").hasClass("accordion")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled"); 
    }
  });   

  $( document ).ready(function() {
    function screenClass() {
      if($(window).innerWidth() > 768) {
        $(".sidebar").hover(function(e) {
          $("body").removeClass("sidebar-toggled");
          $(".sidebar").removeClass("toggled");
        });
        $("#content").hover(function(e) {
          $("body").addClass("sidebar-toggled");
          $(".sidebar").addClass("toggled");
        });
      } else {
        $("body").addClass("sidebar-toggled");
        $(".sidebar").addClass("toggled");
      }  
    } 

    screenClass();

    $(window).bind('resize',function(){
      screenClass();
    });
  });   

  // Close Sub Menus When Hover Over Content
  $("#content").hover(function(e) {
    $("#test-button").addClass("collapsed"); // This test button has to be added into htm nav links as an id
    $("#collapseTwo").removeClass("show");
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict
</script>-->
<script>
    function poambilharga() {
      let element = document.getElementById("parfum");
    let price = element.options[element.selectedIndex].getAttribute("data-harga");
  
}
    </script>

<script>
					
						  $("#tombolselesai").click(function(){
							
								$("#tombolselesai").fadeOut();    		
								}								
            );
						
					</script>
            </body>

            </html>   
