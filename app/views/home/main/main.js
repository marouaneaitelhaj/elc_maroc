<script>
  $(document).ready(function() {
    $("#select").change(function() {
      var selectedOption = $(this).val();
      if (selectedOption == 0) {
        $.ajax({
          url: "/electro-Maroc/public/productlist",
          beforeSend: function() {
            document.querySelector(".container").innerHTML = "<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>";
          },
          success: function(data) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(data, "text/html");
            // console.log(doc.querySelector(".container"));
            document.querySelector(".container").innerHTML = "";
            document.querySelector(".container").appendChild(doc.querySelector(".container"));
          }
        });
      } else {
        $.ajax({
          url: "/electro-Maroc/public/productlist?cat=" + selectedOption,
          beforeSend: function() {
            document.querySelector(".container").innerHTML = "<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>";
            setTimeout(function() {
              // Add any additional code you want to run after the delay here
            }, 2000);
          },
          success: function(data) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(data, "text/html");
            // console.log(doc.querySelector(".container"));
            document.querySelector(".container").innerHTML = "";
            document.querySelector(".container").appendChild(doc.querySelector(".container"));
          }
        });
      }

    });
  });
</script>