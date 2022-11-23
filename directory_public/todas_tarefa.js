function editar(id, txt_tarefa) {
    var form = document.createElement("form");
    form.id = "form-edit"
    form.action = "tarefa_controller.php?acao=atualizar";
    form.method = "post";
    form.autocomplete = "off";

    let inputTarefa = document.createElement("input");
    inputTarefa.type = "text";
    inputTarefa.name = "tarefa";
    inputTarefa.className = "form-control";
    inputTarefa.value = txt_tarefa;

    let inputId = document.createElement("input");
    inputId.type = "hidden";
    inputId.className = "form-control";
    inputId.name = "id";
    inputId.value = id;

    form.appendChild(inputTarefa);
    form.appendChild(inputId);

    let tarefa = document.getElementById("tarefa_" + id);
    tarefa.innerHTML = "";

    tarefa.insertBefore(form, tarefa[0]);

    //ações de disparo

    document.addEventListener('mouseup', function (e) {

        if (!form.contains(e.target)) {
            form.submit();
        }
    });
    document.addEventListener('keyup', function (e) {
        if (e.key == "Enter") {
            form.submit();
        }
    });

}
function tarefaRealizada(id) {
    location.href = "tarefa_controller.php?acao=marcarRealizada&id=" + id;
}
function remover(id) {
    $('#modal-apagar').modal('show');

    let button = document.querySelector('#btn-apagar');

    button.addEventListener('click', function click(e) {
        location.href = "tarefa_controller.php?acao=remover&id=" + id;
    });
}
