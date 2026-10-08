





 <script>
      function showToast(message, position, type) {
        const toast = document.getElementById("toast");
        toast.className = toast.className + " show";

        if (message) toast.innerText = message;

        if (position !== "") toast.className = toast.className + ` ${position}`;
        if (type !== "") toast.className = toast.className + ` ${type}`;

        setTimeout(function () {
          toast.className = toast.className.replace(" show", "");
        }, 3000);
      };
    </script>
    <script src="js/tinymce/tinymce.min.js"></script>
 
<script>
  tinymce.init({
    selector: '#form1Example2', 
    license_key: 'gpl'
  });
</script>
   <?php 
get_message();
?>
</body>

</html>

