window.onload = pageLoad;

function buttonAlert(){

  var textArea = document.getElementById('textArea');
  var fontsize;

  setInterval(function() {

    if(!parseInt(textArea.style.fontSize)){
        textArea.style.fontSize="14pt";
    }else{
      fontsize=parseInt(textArea.style.fontSize)+2;
      // alert(fontsize);
      fontsize = fontsize.toString();
      fontsize=fontsize.concat("pt");
      textArea.style.fontSize = fontsize;
    }

  }, 500);
}

function checkAlert(){

  var check = document.getElementById('checkBox');
  var textArea = document.getElementById('textArea');
  var body = document.getElementById('body');

  if(check.checked){
    textArea.style.fontWeight="bold";
    textArea.style.color="green";
    textArea.style.textDecoration="underline";
    body.style.backgroundImage="url('http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/8/hundred.jpg')";
  }else{
    textArea.style.fontWeight="normal";
    textArea.style.color="black";
    textArea.style.textDecoration="none";
    body.style.backgroundImage='none';
  }
}

function sbuttonAlert(){

  var textArea = document.getElementById('textArea');
  textArea.value = textArea.value.toUpperCase();

  var temp = textArea.value.split(".");
  textArea.value = temp.join("-izzle.");

}

function pigLatin(){
  var textArea = document.getElementById('textArea');
  var target2 = textArea.value.split(" ");
  var target;
  var count;

  for(var i = 0 ; i < target2.length; i++){
    target = target2[i].split("");

    if(target[0]=='a'||target[0]=='e'||target[0]=='i'||target[0]=='o'||target[0]=='u'||target[0]=='A'||target[0]=='E'||target[0]=='I'||
  target[0]=='O'||target[0]=='U'){
      target.push("ay");
    }else{
      count=0;

      while(1){
        if(target[count]=='a'||target[count]=='e'||target[count]=='i'||target[count]=='o'||target[count]=='u'||target[count]=='A'||target[count]=='E'||target[count]=='I'||
      target[count]=='O'||target[count]=='U'){
          break;
        }else{
          count+=1;
        }
      }

      for(var j = 0 ; j<count ;j++){
        target.push(target[0]);
        target.shift();
      }

      target.push("ay");
    }

    target2[i] = target.join('');
  }

  textArea.value = target2.join(' ');
}

function Malkovitch(){
  var textArea = document.getElementById('textArea');
  var target = textArea.value.split(" ");


  for(var i = 0 ; i < target.length ; i++){
    if(target[i].length>=5){
      target[i] = 'Malkovich';
    }
  }

  textArea.value = target.join(' ');
}

function pageLoad() {
    document.getElementById("button").onclick = buttonAlert;
    document.getElementById("checkBox").onchange = checkAlert;
    document.getElementById("sButton").onclick = sbuttonAlert;
    document.getElementById("IgpayAtinlay").onclick = pigLatin;
    document.getElementById("Malkovitch").onclick = Malkovitch;
}
