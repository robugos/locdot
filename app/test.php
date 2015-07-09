<form name="myForm">
<span onclick="copyText(this)" >Text1</span>, <span onclick="copyText(this)" >Text2</span>
<br>
<input name="myField"></input>

<script>
$("#text1").click(function(){
var holdtext = $("#clipboard").innerText;
Copied = holdtext.createTextRange();
Copied.execCommand("Copy");
});


function copyText(element) {
document.myForm.myField.value = element.innerHTML;
}
</script>
