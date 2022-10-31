window.onload=function(){display_prod(2)}
function display_prod(id){
    var safe_active=document.getElementById("safe_tab");
    var detected_active=document.getElementById("detected_tab");
    var updating_active=document.getElementById("updating_tab")
    ;var recommended_active=document.getElementById("recommended_tab");
    var old_active=document.getElementById("old_tab");
    if(id==1) {
            detected_active.classList.remove("active");
            updating_active.classList.remove("active");
            safe_active.classList.remove("active");
            recommended_active.classList.remove("active");
            recommended_active.classList.add("active");
            document.getElementsByClassName('Safe').forEach(e=>e.style.display="none");
            document.getElementsByClassName('Detected').forEach(e=>e.style.display="none");
            document.getElementsByClassName('Updating').forEach(e=>e.style.display="none");
            document.getElementsByClassName('recommended').forEach(e=>e.style.display="none");
            document.getElementsByClassName('recommended').forEach(e=>e.style.display="block");
        } else if(id==2){
            detected_active.classList.remove("active");
            updating_active.classList.remove("active");
            safe_active.classList.remove("active");
            recommended_active.classList.remove("active");
            safe_active.classList.add("active");
            document.getElementsByClassName('Safe').forEach(e=>e.style.display="none");
            document.getElementsByClassName('Detected').forEach(e=>e.style.display="none");
            document.getElementsByClassName('Updating').forEach(e=>e.style.display="none");
            document.getElementsByClassName('recommended').forEach(e=>e.style.display="none");
            document.getElementsByClassName("Safe").forEach(e=>e.style.display="block");
    } else if(id==3){
        detected_active.classList.remove("active");
        updating_active.classList.remove("active");
        safe_active.classList.remove("active");
        recommended_active.classList.remove("active");
        updating_active.classList.add("active");
        document.getElementsByClassName('Safe').forEach(e=>e.style.display="none");
        document.getElementsByClassName('Detected').forEach(e=>e.style.display="none");
        document.getElementsByClassName('Updating').forEach(e=>e.style.display="none");
        document.getElementsByClassName('recommended').forEach(e=>e.style.display="none");
        document.getElementsByClassName("Updating").forEach(e=>e.style.display="block");
    }else if(id==4){detected_active.classList.remove("active");
        updating_active.classList.remove("active");
        safe_active.classList.remove("active");recommended_active.classList.remove("active");detected_active.classList.add("active");document.getElementsByClassName('Safe').forEach(e=>e.style.display="none");document.getElementsByClassName('Detected').forEach(e=>e.style.display="none");document.getElementsByClassName('Updating').forEach(e=>e.style.display="none");document.getElementsByClassName('recommended').forEach(e=>e.style.display="none");document.getElementsByClassName('Detected').forEach(e=>e.style.display="block");}}