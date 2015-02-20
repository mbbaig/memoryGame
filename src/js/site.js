$(function(){
  var firstId, secondId;
  var selected = 0;
  
  $("td").click(function(e) {
    e.preventDefault();

    $(this).children("img").removeClass("blank").addClass("show");

    selectId(this);
  });

  /*Makes sure only two cards are selectable*/
  function selectId (context) {
    if (selected == 0) {
      firstID = $(context).children("img").attr("id");
      $(context).addClass("inactive");                            // Make sure same card can't be select again
    } else if (selected == 1) {
      secondId = $(context).children("img").attr("id");
      $("td").addClass("inactive");
    }

    selected = $(".show").length;

    if (selected > 1) {
      checkId(firstID, secondId);
      selected = 0;
    }
  }

  function checkWinner () {
    var cards = $(".match").length;

    if (cards == 24) {
      $("table").addClass("hide");
      $("#grats").removeClass("hide");                            // Respond to solving to grid
    }
  }

  function checkId(id1, id2) {
    $.ajax({
      url: "/src/checker.php",
      type: "POST",
      data: {firstCard : id1, secondCard : id2},
      dataType: "json",
      success: function (res) {
        switch (res.res) {
          case "match":
            setTimeout(function() {
              $(".show").addClass("match").removeClass("show");   // Indicate winning cards
              $("td").removeClass("inactive");
              $(".match").parent().each(function (index) {
                $(this).addClass("inactive");                     // Disable the solved cards
              })
              checkWinner();
            }, 500);
            break;
          case "miss":
            setTimeout(function() {
              $(".show").addClass("blank").removeClass("show");
              $("td").removeClass("inactive");                    // Re-enable cards after they miss
            }, 1000);
            break;
        }
      },
      error: function (err, status, errThrown) {
        console.log(status);
        console.log(errThrown);
      }
    });
  }
});