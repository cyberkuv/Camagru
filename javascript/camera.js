var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var canvas2 = document.getElementById('canvas2');
var context2 = canvas2.getContext('2d');
var stickers = document.querySelectorAll( '.stickers' );

//go thru every sticker and assign event listener
console.log(stickers[1]);
stickers.forEach( function( item ){
    item.onclick = function(){
        console.log( item );
    }
})

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
{
  navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
  {
      video.srcObject = stream;
  });
}

var filters = new Array;
filters[0] = "./filters/5d99688b4a6538c9394c0675746dd06c.png";
filters[1] = "./filters/465d5167f497eae3c05d7bf7d7c617c1.png";
filters[2] = "./filters/210840_jnLJlp7kSsg8P3NiqSKTvMNBO.gif";
filters[3] = "./filters/Beanie-PNG-HD.png";
filters[4] = "./filters/christmas-hat-png-1.png";
filters[5] = "./filters/DKzPipPXUAALzaE.png";
filters[6] = "./filters/Monkey-D-Luffy-Transparent-PNG.png";
filters[7] = "./filters/PHP-Logo-PNG-Picture.png";
filters[8] = "./filters/PostgreSQL_logo.3colors.540x557.png";
filters[9] = "./filters/shirtpage_headerimage_git@2x-843f6ee42ce981a023ac5008217d494a70893d8186abc089367d750e76154100.png";
filters[10] = "./filters/spider_PNG45.png";
filters[11] = "./filters/super_albino_llama_by_dj88-d2w5oc9.png";

function  add_filters(e)
{
    var image = new Image();
    image.src = filters[e];
    context.drawImage(image,0,0,640,480);
}

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
  context2.drawImage(video, 0, 0, 640, 480);
    context2.drawImage(canvas, 0, 0, 640, 480);
    document.getElementById("img").value = canvas2.toDataURL();
});



function myGray() {
document.getElementById("video").style.WebkitFilter = "grayscale(100%)";
document.getElementById("video").style.WebkitFilter = "grayscale(100%)";
}

function mySaturate() {
document.getElementById("video").style.filter = "saturate(8)";
document.getElementById("video").style.WebkitFilter = "saturate(8)";
}

function mySepia() {
document.getElementById("video").style.filter = "sepia(100%)";
document.getElementById("video").style.WebkitFilter = "sepia(100%)";
}
function myBlur() {
document.getElementById("video").style.filter = "blur(10px)";
document.getElementById("video").style.WebkitFilter = "blur(10px)";
}
function myOpacity() {
document.getElementById("video").style.filter = "opacity(.8)";
document.getElementById("video").style.WebkitFilter = "opacity(.8)";
}
function myBrightness() {
document.getElementById("video").style.filter = "brightness(3)";
document.getElementById("video").style.WebkitFilter = "brightness(3)";
}

function myContrast() {
document.getElementById("video").style.filter = "contrast(4)";
document.getElementById("video").style.WebkitFilter = "contrast(4)";
}
function myInvert() {
document.getElementById("video").style.filter = "invert(100%)";
document.getElementById("video").style.WebkitFilter = "invert(100%)";
document.getElementById("snap").style.filter = "invert(100%)";
document.getElementById("snap").style.WebkitFilter = "invert(100%)";
}
function myHuerotate() {
document.getElementById("video").style.filter = "hue-rotate(90deg)";
document.getElementById("video").style.WebkitFilter = "hue-rotate(90deg)";
}
function myDropShadow() {
document.getElementById("video").style.filter = "drop-shadow(16px 16px 10px rgba(0,0,0,0.9))";
document.getElementById("video").style.WebkitFilter = "drop-shadow(16px 16px 10px rgba(0,0,0,0.9))";

}
function myNone() {
document.getElementById("video").style.filter = "none";
document.getElementById("video").style.WebkitFilter = "none";
}

document.querySelector("#img2").addEventListener("change", previewImg);
function previewImg(e){
if (this.files && this.files[0]){
    var obj = new FileReader();
    obj.onload = function(data){
            img.src = data.target.result;
            document.querySelector("#img3").value = data.target.result;
    }
    obj.readAsDataURL(this.files[0]);
}
}
