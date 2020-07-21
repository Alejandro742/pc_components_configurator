function eventListeners() {
  //Add pc button
  document.querySelector("#form_pc").addEventListener("submit", addPcFunction);
  document.querySelector("#computers-list").addEventListener("click", deletePcFunction);
}
eventListeners();

//#region ADD PC
function addPcFunction(e) {
  e.preventDefault();
  const pc_name = document.getElementById("pc_name").value;
  const pc_desc = document.getElementById("pc_desc").value;
  if (pc_name === "" || pc_desc === "") {
    //Error Handler
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Todos los campos son necesarios!",
    });
  } else {
    //Adding pc to DB
    savePC_DB({ pc_name, pc_desc });
  }
  //Clear Form
  document.querySelector("#form_pc").reset();
}

function savePC_DB(pc_data) {
  //Create AJAX call
  const xhr = new XMLHttpRequest();
  //Send data by form data
  const dataForm = new FormData();
  dataForm.append("pc_name", pc_data.pc_name);
  dataForm.append("pc_desc", pc_data.pc_desc);
  dataForm.append("action", "create");

  //Open the connection
  xhr.open("POST", "includes/models/computer-model.php", true);
  //Onload
  xhr.onload = function () {
    if (this.status === 200) {
      const result = JSON.parse(xhr.responseText);

      //Destructuring the answe
      const { answer, inserted_id, action, pc_name } = result;

      if (answer === "success") {
        //UL
        const computers_list = document.getElementById("computers-list");
        //Creating a li to add new pc to DOM
        const li_list = document.createElement("li");
        li_list.id = inserted_id;
        //Creating the pc name in an "a" label
        const a = document.createElement("a");
        a.innerHTML = pc_name.toUpperCase();
        a.href = "index.php?pc_id:" + inserted_id;
        //Creating a trash icon
        const trash_icon = document.createElement("i");
        //Adding the font awesome classes to "i" label
        trash_icon.classList.add("far", "fa-trash-alt");
        //Append the elements to li list
        li_list.appendChild(a);
        li_list.appendChild(trash_icon);
        //Appending the li to the ul
        computers_list.appendChild(li_list);
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Ha ocurrido un error, intente de nuevo",
        });
      }
    }
  };
  //Sending the request
  xhr.send(dataForm);
}
//#endregion add pc

//#region DELETE PC
function deletePcFunction(e) {
  const id_pc = e.target.classList.contains("far","fa-trash-alt");
  if(id_pc){
        Swal.fire({
          title: "¿Estás seguro?",
          text: "No hay vuelta atrás",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, estoy seguro",
        }).then((result) => {
          if (result.value) {
            const li_pc = e.target.parentElement;
            const id_pc = li_pc.id;
            //Calling AJAX
            const xhr = new XMLHttpRequest();
      
            //Creating the form data
            const data = new FormData();
            data.append("pc_id",id_pc);
            data.append("action","delete");
      
            xhr.open("POST","includes/models/computer-model.php", true);
            xhr.onload = function(){
              if(this.status === 200){
                  const answer = JSON.parse(this.responseText);
                  if(answer.answer === 'success'){
                      li_pc.remove();
                  }
              }
            };
            xhr.send(data);
      
            Swal.fire("Deleted!", "PC Borrada", "success");
          }
        });

  }
}

//#endregion delete pc
