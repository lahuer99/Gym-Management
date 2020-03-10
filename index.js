function hider1() {

    for (let index = 1; index <= 9; index++) {

        if(index===1){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid1").classList.toggle("hider1");
}

function hider2() {

    for (let index = 1; index <= 9; index++) {

        if(index===2){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid2").classList.toggle("hider2");
}

function hider3() {

    for (let index = 1; index <= 9; index++) {

        if(index===3){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid3").classList.toggle("hider3");
}

function hider4() {

    for (let index = 1; index <= 9; index++) {

        if(index===4){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid4").classList.toggle("hider4");
}

function hider5() {

    for (let index = 1; index <= 9; index++) {

        if(index===5){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid5").classList.toggle("hider5");
}

function hider6() {

    for (let index = 1; index <= 9; index++) {

        if(index===6){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid6").classList.toggle("hider6");
}

function hider7() {

    for (let index = 1; index <= 9; index++) {

        if(index===7){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid7").classList.toggle("hider7");
}


function hider8() {

    for (let index = 1; index <= 9; index++) {

        if(index===8){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid8").classList.toggle("hider8");
}


function hider9() {

    for (let index = 1; index <= 9; index++) {

        if(index===9){
            continue;
        }
        var dummyclass='.hid'+index;
        var dummyclass2="hider"+index;
        document.querySelector(dummyclass).classList.add(dummyclass2);
        
    }
    document.querySelector(".hid9").classList.toggle("hider9");
}





/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  } 