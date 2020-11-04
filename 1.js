function info_send (elem, time, text) { //func for show info messeage in div/info_send after Promise to insert in DB
    elem.innerText = text;
    setTimeout(() => {
        elem.innerText = " "
    }, time)
}


function make_req(url) {
    let form = document.querySelector("form"),
        data = new FormData(form),
        xhr = new XMLHttpRequest();

    //check filled inputs
    // take value by key. FormData object .get
    let info_send_elem = document.querySelector('.info');

    xhr.open('POST', url, true);
    xhr.onreadystatechange =  () => {
        if (xhr.readyState === 4 ) //same XMLhttpRequest.DONE
        {
            let target_el_info = document.querySelector(".info");
            let status = xhr.status;
            if ((status >= 200 && status < 300) && xhr.responseText == "" ) { //
                // all great ... so we are happy!
                console.log(xhr.status +  " " +  'good' + " " +   xhr.readyState + " " + xhr.responseText);
                info_send(target_el_info, 1500, "Very good, now wait. NBD!)")
            }
            else
            {  // no db connect, no url  send.php
                console.log(xhr.status + 'from else, it\'s mean that DB connect fail or other problems + xhr.readyState' + " " + xhr.readyState + " " +  xhr.responseText)  ;
                info_send(target_el_info, 2000, "Please try later");
            }
        }
    }
    xhr.send(data);
}
async function request() {
    make_req('send.php')
}
