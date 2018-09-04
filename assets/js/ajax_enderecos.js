function showCidades(uf_id) {
    if (uf_id == 0) {
        alert("Selecione um estado!");
        return;
    } else {
        let http_request = new XMLHttpRequest();
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                let http_response = http_request.responseText;
                document.getElementById('div_cidade').innerHTML = http_response;
            }
        };
        http_request.open("GET", "cidades.php?uf=" + uf_id, true);
        http_request.send();
    }
}

function showBairros(cid_id) {
    if (cid_id == 0) {
        return;
    } else {
        let http_request = new XMLHttpRequest();
        http_request.onreadystatechange = function() {
            if (http_request.readyState == 4 && http_request.status == 200) {
                let http_response = http_request.responseText;
                document.getElementById('div_bairro').innerHTML = http_response;
            }
        };
        http_request.open("GET", "bairros.php?cidade=" + cid_id, true);
        http_request.send();
    }
}