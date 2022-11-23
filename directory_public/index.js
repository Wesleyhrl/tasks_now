function limparAlerta() {
    let div = document.getElementsByClassName("text-danger");
    
    for (let index = 0; index < div.length; index++) {
        div[index].innerHTML = "";
        
    }
}
function cadastrar(){
    $('#modal-cadastrar').modal('show');
}