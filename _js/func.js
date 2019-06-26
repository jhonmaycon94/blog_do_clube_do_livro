function edit_sobre(){
  //get os elementos necessários para substituição;
  var p = document.getElementById('p_sobre');
  var container = document.getElementById('div-aside');
  var icone = document.getElementById('icone_editar_sobre');

  //cria o formulario para substituir o parágrafo
  //texto no modo edição;
  var form = document.createElement('form');
  form.action = "resources/sobre_res.php";
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
  bt.name = "bt_editar_sobre";
  bt.innerText = "Editar";

  //cria toda a estrutura do formulario e substitui o parágrafo
  form.appendChild(div);
  div.appendChild(label);
  div.appendChild(textarea);
  form.appendChild(bt);
  container.replaceChild(form, p);
  container.removeChild(icone);
}

function manipula_foto_perfil(_caminho_foto){
  var foto_perfil = Document.getElementById('foto_perfil').src = _caminho_foto;
}

function add_livro(user_id){
  var row_add_livro = document.getElementById('bt-row-livros');
  var tab_pane_livros = document.getElementById('livros');

  var form = document.createElement('form');
  form.action = "resources/add_livro.php?user_id="+user_id;
  form.method = "POST";

  var row = document.createElement('div');
  row.classList.add("row");

  var col_titulo = document.createElement('div');
  col_titulo.classList.add("col-md-3");
  
  var col_autor = document.createElement('div');
  col_autor.classList.add("col-md-3");

  var col_ano = document.createElement('div');
  col_ano.classList.add("col-md-3");
  
  var col_genero = document.createElement('div');
  col_genero.classList.add("col-md-3");
  
  var titulo_group = document.createElement('div');
  titulo_group.classList.add("form-group");

  var autor_group = document.createElement('div');
  autor_group.classList.add("form-group");

  var ano_group = document.createElement('div');
  ano_group.classList.add("form-group");

  var genero_group = document.createElement('div');
  genero_group.classList.add("form-group");

  var input_titulo = document.createElement('input')
  input_titulo.classList.add("form-control");
  input_titulo.type = "text";
  input_titulo.id = "input_titulo";
  input_titulo.name = "input_titulo";
  input_titulo.placeholder = "Título...";

  var input_autor = document.createElement('input');
  input_autor.classList.add("form-control");
  input_autor.type = "text";
  input_autor.id = "input_autor";
  input_autor.name = "input_autor";
  input_autor.placeholder = "Autor...";

  var input_ano = document.createElement('input');
  input_ano.classList.add("form-control");
  input_ano.type = "text";
  input_ano.id = "input_ano";
  input_ano.name = "input_ano";
  input_ano.placeholder = "Ano...";

  var input_genero = document.createElement('input');
  input_genero.classList.add("form-control");
  input_genero.type = "text";
  input_genero.id = "input_genero";
  input_genero.name = "input_genero";
  input_genero.placeholder = "Gênero...";

  var bt_add_livro = document.createElement("button");
  bt_add_livro.type = "submit";
  bt_add_livro.name = "bt_add_livro";
  bt_add_livro.innerText = "Adicionar livro";
  bt_add_livro.classList.add("btn");
  bt_add_livro.classList.add("btn-dark");
  bt_add_livro.classList.add("btn_small");

  var row_bt = document.createElement("div");
  row_bt.classList.add("row");

  var col_bt = document.createElement("div");
  col_bt.classList.add("col-md-12");

  tab_pane_livros.appendChild(form);
  form.appendChild(row);
  row.appendChild(col_titulo);
  row.appendChild(col_autor);
  row.appendChild(col_ano);
  row.appendChild(col_genero);
  col_titulo.appendChild(titulo_group);
  titulo_group.appendChild(input_titulo);
  col_autor.appendChild(autor_group);
  autor_group.appendChild(input_autor);
  col_ano.appendChild(ano_group);
  ano_group.appendChild(input_ano);
  col_genero.appendChild(genero_group);
  genero_group.appendChild(input_genero);
  tab_pane_livros.removeChild(row_add_livro);
  form.appendChild(row_bt);
  row_bt.appendChild(col_bt);
  col_bt.appendChild(bt_add_livro);
}

function add_autor(user_id){
  var tab_escritores = document.getElementById("escritores");
  var row_bt_add_autor = document.getElementById("bt-row-autores");

  var form = document.createElement("form");
  form.action = "resources/add_autor.php?user_id="+user_id;
  form.method = "POST";

  var row_input = document.createElement("div");
  row_input.classList.add("row");

  var col1 = document.createElement("div");
  col1.classList.add("col-md-6");

  var col2 = document.createElement("div");
  col2.classList.add("col-md-6");

  var nome_group = document.createElement("div");
  nome_group.classList.add("form-group");

  var sobrenome_group = document.createElement("div");
  sobrenome_group.classList.add("form-group");

  var input_nome = document.createElement("input");
  input_nome.type = "text";
  input_nome.name = "input_nome_autor";
  input_nome.id = "input_nome_autor";
  input_nome.classList.add("form-control");
  input_nome.placeholder = "Nome do autor...";

  var input_sobrenome = document.createElement("input");
  input_sobrenome.type = "text";
  input_sobrenome.name = "input_sobrenome_autor";
  input_sobrenome.id = "input_sobrenome_autor";
  input_sobrenome.classList.add("form-control");
  input_sobrenome.placeholder = "Sobrenome do autor...";

  var row_bt = document.createElement("div");
  row_bt.classList.add("row");

  var col_bt = document.createElement("div");
  col_bt.classList.add("col-md-12");

  var bt_add_autor = document.createElement("button");
  bt_add_autor.type = "submit";
  bt_add_autor.classList.add("btn");
  bt_add_autor.classList.add("btn-dark");
  bt_add_autor.classList.add("btn-small");
  bt_add_autor.name = "bt_add_autor";
  bt_add_autor.innerText = "adicionar escritor";

  tab_escritores.appendChild(form);
  tab_escritores.removeChild(row_bt_add_autor);
  form.appendChild(row_input);
  form.appendChild(row_bt);
  row_input.appendChild(col1);
  row_input.appendChild(col2);
  col1.appendChild(nome_group);
  nome_group.appendChild(input_nome);
  col2.appendChild(sobrenome_group);
  sobrenome_group.appendChild(input_sobrenome);
  row_bt.appendChild(col_bt);
  col_bt.appendChild(bt_add_autor);

}

function add_genero(user_id){
  var tab_generos = document.getElementById("generos");
  var bt = document.getElementById("bt-row-genero");

  var form = document.createElement("form");
  form.action = "resources/add_genero.php?user_id="+user_id;
  form.method = "POST";

  var row_input = document.createElement("div");
  row_input.classList.add("row");

  var col_input1 = document.createElement("div");
  col_input1.classList.add("col-md-6");

  var col_input2 = document.createElement("div");
  col_input2.classList.add("col-md-6");

  var form_group_input = document.createElement("div");
  form_group_input.classList.add("form-group");

  var form_group_bt = document.createElement("div");
  form_group_bt.classList.add("form-group");

  var input_genero = document.createElement("input");
  input_genero.type = "text";
  input_genero.id = "input_genero";
  input_genero.name = "input_genero";
  input_genero.placeholder = "adicione um gênero...";
  input_genero.classList.add("form-control");

  var row_bt = document.createElement("div");
  row_bt.classList.add("row");

  var col_bt = document.createElement("div");
  col_bt.classList.add("col-md-12");

  var bt_add_genero = document.createElement("button");
  bt_add_genero.type = "submit";
  bt_add_genero.id = "bt_add_genero";
  bt_add_genero.name = "bt_add_genero";
  bt_add_genero.classList.add("btn");
  bt_add_genero.classList.add("btn-dark");
  bt_add_genero.classList.add("btn-small");
  bt_add_genero.innerHTML = "adicionar gênero";

  tab_generos.appendChild(form);
  tab_generos.removeChild(bt);
  form.appendChild(row_input);
  row_input.appendChild(col_input1);
  row_input.appendChild(col_input2);
  col_input1.appendChild(form_group_input);
  form_group_input.appendChild(input_genero);
  form.appendChild(row_bt);
  row_bt.appendChild(col_bt);
  col_bt.appendChild(form_group_bt);
  form_group_bt.appendChild(bt_add_genero);
  
}