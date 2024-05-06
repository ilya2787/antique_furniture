
var input_file = document.querySelectorAll(".input-file");
for (var i = 0; i < input_file.length; i++) {
    let spantext = input_file[i].querySelector('span');
    input_file[i].querySelector('input[type=file]').addEventListener("change", function (){
        let file = this.files[0];
        spantext.innerHTML= file.name;
        console.log(file.name);
    });
}


const But_mobil_contact = document.querySelector(".buttom_phone");

But_mobil_contact.addEventListener("click", () => {
    document.querySelector(".contact").classList.toggle('contact_active');
    document.querySelector(".buttom_phone").classList.toggle('buttom_phone_active');
})

const animation = document.querySelectorAll("._anim_items");
if (animation.length > 0) {
    window.addEventListener('scroll', animOnscroll);
    function animOnscroll(params){
        for (let index = 0; index < animation.length; index++) {
            const animItem = animation[index];
            const animItemHeight = animItem.offsetHeight;
            const animItemOffset = offset(animItem).top;
            const animStart = 4;

            let animItemPoint = window.innerHeight - animItemHeight / animStart;

            if (animItemHeight > window.innerHeight) {
                animItemPoint = window.innerHeight - window.innerHeight / animStart;
            }

            if((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)){
                animItem.classList.add("_active");
            }else{
                if(!animItem.classList.contains("_anim_no_hide")){
                    animItem.classList.remove("_active");
                }
            }
    }
    function offset(el) {
        const rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
    }
}
setTimeout(animOnscroll, 300);
}



