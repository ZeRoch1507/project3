// Get all images with class "myImg"
var images = document.querySelectorAll('.myImg');
images.forEach(image => {
  // Attach click event to each image
  image.onclick = function() {
    // Find the closest modal element to this image
    var modal = this.nextElementSibling;
    var modalImg = modal.querySelector('.modal-content');
    var captionText = modal.querySelector('.caption');

    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;

    // Get the close button within this modal
    var span = modal.querySelector('.close');
    span.onclick = function() {
      modal.style.display = "none";
    }
  }
});
