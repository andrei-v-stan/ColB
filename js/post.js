let index = 0
function nextImg() {
    if (index==0) {
        document.getElementById("image_display").src = "../resources/search/2.png";
        document.getElementById("big_img").src = "../resources/search/2.png";
        index++;
    }else if (index==1) {
        document.getElementById("image_display").src = "../resources/search/3.png";
        document.getElementById("big_img").src = "../resources/search/3.png";
        index++;
    }else if (index ==2){
        document.getElementById("image_display").src = "../resources/search/1.png";
        document.getElementById("big_img").src = "../resources/search/1.png";
        index = 0;
    }
}
function prevImg(){
    console.debug(index)
    if (index==0) {
        document.getElementById("image_display").src = "../resources/search/3.png";
        document.getElementById("big_img").src = "../resources/search/3.png";
        index = 2;
    }else if (index ==1) {
        document.getElementById("image_display").src = "../resources/search/1.png";
        document.getElementById("big_img").src = "../resources/search/1.png";
        index--;
    }else if (index ==2) {
        document.getElementById("image_display").src = "../resources/search/2.png";
        document.getElementById("big_img").src = "../resources/search/2.png";
        index--;
    }
}
function showImg(){
    document.getElementById("big_img").style.cssText = "display:block"
    document.getElementById("big_img_container").style.cssText = "display:block"

}
function hideImg(){
    document.getElementById("big_img").style.cssText = "display:none"
    document.getElementById("big_img_container").style.cssText = "display:none"

}