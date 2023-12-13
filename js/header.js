var currentCell = null;

function toggleList(listId, cell) {
  var list = document.getElementById(listId);

  if (list) {
    var isListVisible = list.style.display === "block";

    console.log(isListVisible);

    var allLists = document.querySelectorAll(".ul-res");
    allLists.forEach(function (l) {
      l.style.display = "none";
    });

    var allLists = document.querySelectorAll(".ul-res li");
    allLists.forEach(function (l) {
      l.style.display = "block";
    });

    if (currentCell) {
      currentCell.style.backgroundColor = "";
    }

    list.style.display = isListVisible ? "none" : "block";
    cell.style.backgroundColor = isListVisible ? "" : "#E6E3DC";

    currentCell = cell;
  }
}

window.addEventListener("resize", function () {
  var allLists = document.querySelectorAll(".ul-res");
  allLists.forEach(function (l) {
    l.style.display = "none";
  });

  var allLists = document.querySelectorAll(".ul-res li");
  allLists.forEach(function (list) {
    list.style.display = "none";
  });

  if (currentCell) {
    currentCell.style.backgroundColor = "";
  }
});
