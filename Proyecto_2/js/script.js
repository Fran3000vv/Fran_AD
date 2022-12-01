document.querySelector(".box1").addEventListener("click", box_selected1);
const b2=Boolean(document.querySelector(".box2")!==null);
const b3=Boolean(document.querySelector(".box3")!==null);
if(b2){
    document.querySelector(".box2").addEventListener("click", box_selected2);
    if(b3){
        document.querySelector(".box3").addEventListener("click", box_selected3);
    }
}

//declarando variables

//box1

box1 = document.querySelector(".box1");

//box2

if(b2){
    box2 = document.querySelector(".box2");

    //box3

    if(b3){
        box3 = document.querySelector(".box3");
    }
}

value_box = 0;

function box_selected1 () {
    if(b2){
        box2.classList.remove('box-selected');
        if(b3){
            box3.classList.remove('box-selected');
        }
    }
    box1.classList.toggle('box-selected');

    value_box = 1;
    if(document.getElementById("seleccion").value==value_box){
        document.getElementById("seleccion").value=0;
        console.log(0);
    }else{
        document.getElementById("seleccion").value=value_box;
        console.log(value_box);
    }
}

function box_selected2 () {
    if(b2){
        box1.classList.remove('box-selected');
        if(b3){
            box3.classList.remove('box-selected');
        }
        box2.classList.toggle('box-selected');

        value_box = 2;
        if(document.getElementById("seleccion").value==value_box){
            document.getElementById("seleccion").value=0;
            console.log(0);
        }else{
            document.getElementById("seleccion").value=value_box;
            console.log(value_box);
        }
    }
}

function box_selected3 () {
    if(b3){
        box1.classList.remove('box-selected');
        box2.classList.remove('box-selected');
        box3.classList.toggle('box-selected');

        value_box = 3;
        if(document.getElementById("seleccion").value==value_box){
            document.getElementById("seleccion").value=0;
            console.log(0);
        }else{
            document.getElementById("seleccion").value=value_box;
            console.log(value_box);
        }
    }
}