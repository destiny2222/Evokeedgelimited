<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="/vendors/assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="/vendors/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Defaultmenu JS -->
<script src="/vendors/assets/js/defaultmenu.min.js"></script>
<!-- Node Waves JS-->
<script src="/vendors/assets/libs/node-waves/waves.min.js"></script>
<!-- Sticky JS -->
<script src="/vendors/assets/js/sticky.js"></script>
<!-- Simplebar JS -->
<script src="/vendors/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/vendors/assets/js/simplebar.js"></script>
<!-- Color Picker JS -->
<script src="/vendors/assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>
<!-- JSVector Maps JS -->
<script src="/vendors/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<!-- JSVector Maps MapsJS -->
<script src="/vendors/assets/libs/jsvectormap/maps/world-merc.js"></script>
<!-- Apex Charts JS -->
<script src="/vendors/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="/vendors/assets/libs/filepond/filepond.min.js"></script>
<script src="/vendors/assets/libs/quill/quill.min.js"></script> <!-- Filepond JS -->
 <!-- Chartjs Chart JS -->
 <script src="/vendors/assets/libs/chart.js/chart.min.js"></script>
 <!-- CRM-Dashboard -->
 {{-- <script src="/vendors/assets/js/crm-dashboard.js"></script> --}}
 <!-- Custom-Switcher JS -->
 <script src="/vendors/assets/js/custom-switcher.min.js"></script>
 <!-- Custom JS -->
 <!-- Add this script at the end of your HTML, after the theme switcher code -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Check if there is a saved theme preference in localStorage
    const savedTheme = localStorage.getItem("theme");

    // If a theme is saved, apply it; otherwise, use the default
    if (savedTheme) {
      document.body.classList.add(savedTheme);
    }

    // Listen for changes in the theme switcher and update localStorage
    const themeSwitcherInputs = document.querySelectorAll('input[name="theme-style"]');
    themeSwitcherInputs.forEach(function (input) {
      input.addEventListener("change", function () {
        const selectedTheme = this.id.replace("switcher-", "");
        document.body.className = ""; // Remove all existing classes
        document.body.classList.add(selectedTheme);

        // Save the selected theme to localStorage
        localStorage.setItem("theme", selectedTheme);
      });
    });
  });
</script>

 <script src="/vendors/assets/js/blog-create.js"></script> <!-- Custom JS -->
 <script>
  ClassicEditor
  .create( document.querySelector('#summary-body') )
  .catch( error => {
  console.error( error );
  } );
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

 <script>
    function getFile() {
    document.getElementById("upfile").click();
  }

  function sub(obj) {
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
    document.myForm.submit();
    event.preventDefault();
  }
 </script>
  <script src="/vendors/assets/js/custom.js"></script>