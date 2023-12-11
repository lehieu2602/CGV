var currentCell = null;

function toggleList(listId, cell) {
  var list = document.getElementById(listId);
  if (list) {
    var isListVisible = list.style.display === "block";

    var allLists = document.querySelectorAll(".ul-res");
    allLists.forEach(function (l) {
      l.style.display = "none";
    });

    if (currentCell) {
      currentCell.style.backgroundColor = "";
    }

    list.style.display = isListVisible ? "none" : "block";
    cell.style.backgroundColor = isListVisible ? "" : "#E6E3DC";

    currentCell = cell;
  }
}
