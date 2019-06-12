function edit_sobre(){
  //get os elementos necessários para substituição;
  var p = document.getElementById('p_sobre');
  var container = document.getElementById('div-aside');
  var icone = document.getElementById('icone_editar_sobre');

  //cria o formulario para substituir o parágrafo
  //texto no modo edição;
  var form = document.createElement('form');
  form.action = "#";
  form.method = "post";
  form.classList.add("mt-2");

  var div = document.createElement('div');
  div.classList.add("form-group");

  var label = document.createElement('label');
  label.classList.add("sr-only");
  label.for = "conteudo_editar";
  label.innerText = "Escreva aqui sobre o Blog...";

  var textarea = document.createElement('textarea');
  textarea.id = "conteudo_editar";
  textarea.name = "conteudo_editar";
  textarea.classList.add("form-control");
  textarea.rows = "8";
  textarea.placeholder = "Escreva aqui sobre o Blog...";

  bt = document.createElement('button');
  bt.type = "submit";
  bt.classList.add("btn");
  bt.classList.add("btn-dark");
  bt.classList.add("btn-sm");
  bt.innerText = "Editar";

  //cria toda a estrutura do formulario e substitui o parágrafo
  form.appendChild(div);
  div.appendChild(label);
  div.appendChild(textarea);
  form.appendChild(bt);
  container.replaceChild(form, p);
  container.removeChild(icone);
}
