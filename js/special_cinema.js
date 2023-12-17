window.onload = function () {
  changeImageColor(1, "structure2");
};

var currentImage = null;

function changeImageColor(imageNumber, structure) {
  if (currentImage !== null) {
    var previousImage = document.getElementById("img" + currentImage);
    previousImage.src = "../img/cgv-cine-" + currentImage + ".png";
  }

  currentImage = imageNumber;
  var currentImageElement = document.getElementById("img" + currentImage);
  currentImageElement.src = "../img/cgv-cine-" + currentImage + "-c.png";
  changeStructure(imageNumber, structure);
}

function changeStructure(imageNumber, structure) {
  if (structure === "structure1") {
    document.getElementById("imageStructure").style.display = "flex";
    document.getElementById("textAndSlideStructure").style.display = "none";
    changeImages(imageNumber);
  } else if (structure === "structure2") {
    document.getElementById("imageStructure").style.display = "none";
    document.getElementById("textAndSlideStructure").style.display = "block";
  }
}

var imageOptions = {
  5: [
    "../img/000-gc.jpg",
    "../img/001-gc.jpg",
    "../img/002-gc.jpg",
    "../img/003-gc.jpg",
    "../img/004-gc.jpg",
    "../img/005-gc.jpg",
    "../img/006-gc.jpg",
  ],
  option2: ["image3.jpg", "image4.jpg" /* Add more images as needed */],
};

function changeImages(option) {
  console.log(option);
  var selectedOption = option;
  var imageStructure = document.getElementById("imageStructure");

  imageStructure.innerHTML = "";

  if (imageOptions[selectedOption]) {
    imageOptions[selectedOption].forEach(function (src) {
      addImage(src);
    });
  }
}

function addImage(src) {
  var image = document.createElement("img");
  image.src = src;
  document.getElementById("imageStructure").appendChild(image);
}
